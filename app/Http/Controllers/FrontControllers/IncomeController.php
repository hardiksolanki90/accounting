<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Model\Bank;
use App\Model\Income;
use App\Model\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::get();

        return view('income.list', compact('incomes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $income = new Income;
        $banks = Bank::get();
        $invoice = Invoice::where('status', 'billed')->get();
        $data = array(
            'income' => $income,
            'banks' => $banks,
            'invoice' => $invoice
        );

        return view('income.add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = array(
            'invoice_number.integer' => 'The invoice number field is required'
        );

        $validator = \Validator::make(request()->input(), [
            'invoice_number' => 'required|integer',
            'amount' => 'required',
            'date_of_transaction' => 'required|date',
            'type' => 'required'
        ], $message);

        if($validator->fails())
        {
            return redirect()->back()->withInput(request()->input())->with('error', $validator->errors()->first());
        }

        if ($request->type == 'bank') {
            $msg = array(
                'bank_id.required' => 'The bank field is required',
                'bank_id.integer' => 'The bank field is required'
            );

            $validator = \Validator::make(request()->input(), [
                'bank_id' => 'required|integer|exists:banks,id',
                'transaction_id' => 'required'
            ], $msg);
    
            if($validator->fails())
            {
                return redirect()->back()->withInput(request()->input())->with('error', $validator->errors()->first());
            }
        }

        $income = new Income;
        $income->invoice_id = $request->invoice_number;
        $income->invoice_number = getInvoiceCombination($request->invoice_number);
        $income->amount = $request->amount;
        $income->type = $request->type;
        $income->date_of_transaction = $request->date_of_transaction;
        $income->transaction_id = $request->transaction_id;
        if ($request->type == 'bank') {
            $income->bank_id = $request->bank_id;
            $income->transaction_id = $request->transaction_id;
        } else {
            $income->bank_id = null;
            $income->transaction_id = null;
        }
        $income->created_by = Auth()->user()->id;
        $income->modified_by = Auth()->user()->id;
        $income->save();

        return redirect(route('income.list'))->with('status', 'Income added successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$id) {
            return redirect(route('income.list'))->with('error', 'Opps! there is some problem.');
        }

        $income = Income::find($id);
        $invoice = Invoice::where('status', 'billed')->get();
        $banks = Bank::get();

        $data = array(
            'invoice' => $invoice,
            'income' => $income,
            'banks' => $banks
        );

        return view('income.add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make(request()->input(), [
            'invoice_number' => 'required',
            'amount' => 'required',
            'type' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withInput(request()->input())->with('error', $validator->errors()->first());
        }

        if ($request->type == 'bank') {
            $bankValidatedData = $request->validate([
                // 'date_of_transaction' => 'required|date',
                'transaction_id' => 'required',
                'bank_id' => 'required|integer|exists:banks,id'
            ]); 
        }


        $income = Income::find($id);
        $income->invoice_id = $request->invoice_number;
        $income->invoice_number = getInvoiceCombination($request->invoice_number);
        $income->amount = $request->amount;
        $income->type = $request->type;
        $income->date_of_transaction = $request->date_of_transaction;
        $income->transaction_id = $request->transaction_id;
        if ($request->type == 'bank') {
            $income->bank_id = $request->bank_id;
            $income->transaction_id = $request->transaction_id;
        } else {
            $income->bank_id = null;
            $income->transaction_id = null;
        }
        $income->modified_by = Auth()->user()->id;
        $income->save();

        return redirect(route('income.list'))->with('status', 'Income updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$id) {
            return redirect(route('income.list'))->with('error', 'Opps! there is some problem.');
        }

        $income = Income::find($id);

        if (is_object($income)) {
            $income->delete();
            return redirect(route('income.list'))->with('status', 'Record deleted successfully.');
        }

        return redirect(route('income.list'))->with('error', 'Opps! there is some problem.');
    }
}
