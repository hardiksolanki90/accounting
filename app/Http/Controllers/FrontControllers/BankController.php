<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Model\Bank;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banks = Bank::get();

        return view('bank.list', compact('banks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = new Bank;

        return view('bank.add', compact('bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make(request()->input(), [
            'account_number' => 'required|numeric',
            'account_name' => 'required|max:190',
            'bank_name' => 'required|max:190',
            'bank_address' => 'required|max:190',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput(request()->input())->withErrors($validator);
        }

        $bank = new Bank;
        $bank->account_number = $request->account_number;
        $bank->account_name = $request->account_name;
        $bank->bank_name = $request->bank_name;
        $bank->bank_address = $request->bank_address;
        $bank->description = $request->description;
        $bank->created_by = Auth::user()->id;
        $bank->modified_by = Auth::user()->id;
        $bank->save();

        return redirect(route('bank.list'))->with('status', 'Bank saved successfully!');
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
            return redirect()->back()->withInput(request()->input())->withErrors(array('Opps! there is some problem.'));
        }

        $bank = Bank::find($id);
        return view('bank.add', compact('bank'));
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
            'account_number' => 'required|numeric',
            'account_name' => 'required|max:190',
            'bank_name' => 'required|max:190',
            'bank_address' => 'required|max:190',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput(request()->input())->withErrors($validator);
        }

        $bank = Bank::find($id);
        $bank->account_number = $request->account_number;
        $bank->account_name = $request->account_name;
        $bank->bank_name = $request->bank_name;
        $bank->bank_address = $request->bank_address;
        $bank->description = $request->description;
        // $bank->created_by= Auth::user()->id;
        $bank->modified_by = Auth::user()->id;
        $bank->save();

        return redirect(route('bank.list'))->with('status', 'Bank updated successfully!');
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
            return redirect(route('bank.list'))->withErrors(array('Opps! there is some problem.'));
        }

        $bank = Bank::find($id);

        if (is_object($bank)) {
            $bank->delete();
            return redirect(route('bank.list'))->with('status', 'Record deleted successfully.');
        }
        return redirect(route('bank.list'))->withErrors(array('Opps! there is some problem.'));
    }
}
