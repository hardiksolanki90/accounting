<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Model\Invoice;
use App\Model\InvoiceDetail;
use App\Model\Client;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::with('client')->get();

        return view('invoices.list', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $invoice = new Invoice;
        $clients = Client::select('id', 'name')->get();
        $last_number = Invoice::latest('id')->first();
        
        if (is_object($last_number)) {
            $last = $last_number->id;
        } else {
            $last = 1;
        }

        $data = array(
            'invoice' => $invoice,
            'clients' => $clients,
            'last_number' => $last
        );

        return view('invoices.add', $data);
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
            'client_id.required' => "The client field is required.",
            'client_id.integer' => "The client field is required.",
            'date.required' => "The invoice date field is required."
        );

        $validator = \Validator::make(request()->input(), [
            'date' => 'required|date',
            'due_date' => 'required|date',
            'client_id' => 'required||integer|exists:clients,id',
            'invoice_number' => 'required|numeric',
            'billing_type' => 'required',
            'status' => 'required',
            'applicable_tax_percentage' => 'numeric'
        ], $message);
        
        if($validator->fails())
        {
            return redirect()->back()->withInput(request()->input())->with('error', $validator->errors()->first());
        }

        if ($request->billing_type == "fixed") {
            if (!$request->fdescription) {
                return redirect()->back()->withInput(request()->input())->with('error', 'Error Please add description.');
            }
            if (!$request->cost) {
                return redirect()->back()->withInput(request()->input())->with('error', 'Error Please add cost.');
            }
        }

        if ($request->billing_type == "hourly") {
            if (is_array($request->description) && sizeof($request->description) < 1) {
                return redirect()->back()->withInput(request()->input())->with('error', 'Error Please add atleast one description.');
            }
        }

        \DB::beginTransaction();
        try {
            $invoice = new Invoice;
            $invoice->number = $request->invoice_number;
            $invoice->date = $request->date;
            $invoice->due_date = $request->due_date;
            $invoice->client_id = $request->client_id;
            $invoice->billing_type = $request->billing_type;
            $invoice->applicable_tax_percentage = $request->applicable_tax_percentage;
            $invoice->status = $request->status;
            $invoice->created_by = Auth()->user()->id;
            $invoice->modified_by = Auth()->user()->id;

            if ($request->billing_type == 'fixed') {
                $invoice->fdescription = $request->fdescription;
                $invoice->cost = $request->cost;
            }

            $invoice->save();

            if ($request->billing_type == 'hourly') {
                pre('jere');
                foreach ($request->description as $key => $disc) {
                    $invoice_detail = new InvoiceDetail;
                    $invoice_detail->invoice_id = $invoice->id;
                    $invoice_detail->description = $disc;
                    $invoice_detail->hours = $request->hours[$key];
                    $invoice_detail->per_hour_price = $request->per_hour_price[$key];
                    $invoice_detail->total = $request->total[$key];
                    $invoice_detail->save();
                }
            }

            \DB::commit();
            return redirect(route('invoice.list'))->with('status', 'Invoice added successfully!');
        } catch (\Exception $exception) {
            \DB::rollback();
            return redirect()->back()->withInput(request()->input())->with('error', $exception->getMessage());
        } catch (\Throwable $exception) {
            \DB::rollback();
            return redirect()->back()->withInput(request()->input())->with('error', $exception->getMessage());
        }
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
            return redirect(route('invoices.list'))->with('error', 'Opps! there is some problem.');
        }
        $clients = Client::select('id', 'name')->get();
        $invoice = Invoice::find($id);
        $invoice->client;

        $data = array(
            'invoice' => $invoice,
            'clients' => $clients
        );

        return view('invoices.add', $data);
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
        $message = array(
            'client_id.required' => "The client is required.",
            'client_id.integer' => "The client is required."
        );

        $validator = \Validator::make(request()->input(), [
            'client_id' => 'required||integer|exists:clients,id',
            'invoice_number' => 'required|numeric',
            'date' => 'required|date',
            'due_date' => 'required|date',
            'billing_type' => 'required',
            'status' => 'required',
            'applicable_tax_percentage' => 'numeric'
        ], $message);
        
        if($validator->fails())
        {
            return redirect()->back()->withInput(request()->input())->with('error', $validator->errors()->first());
        }

        if ($request->billing_type == "fixed") {
            if (!$request->fdescription) {
                return redirect()->back()->withInput(request()->input())->with('error', 'Error Please add description.');
            }
            if (!$request->cost) {
                return redirect()->back()->withInput(request()->input())->with('error', 'Error Please add cost.');
            }
        }
        
        if ($request->billing_type == "hourly") { 
            if (is_array($request->description) && sizeof($request->description) < 1) {
                return redirect()->back()->withInput(request()->input())->with('error', 'Error Please add atleast one description).');
            }
        }

        \DB::beginTransaction();
        try {
            InvoiceDetail::where('invoice_id', $id)->delete();
            $client = Client::find($request->client_id);
            $invoice = Invoice::find($id);
            $invoice->number = $request->invoice_number;
            $invoice->date = $request->date;
            $invoice->due_date = $request->due_date;
            $invoice->client_id = $request->client_id;
            $invoice->billing_type = $request->billing_type;
            $invoice->applicable_tax_percentage = $request->applicable_tax_percentage;
            $invoice->status = $request->status;
            // $invoice->created_by = Auth()->user()->id;
            $invoice->modified_by = Auth()->user()->id;
            
            if ($request->billing_type == 'fixed') {
                $invoice->fdescription = $request->fdescription;
                $invoice->cost = $request->cost;
            }
            
            $invoice->save();
            
            if ($request->billing_type == 'hourly') {
                foreach ($request->description as $key => $disc) {
                    $invoice_detail = new InvoiceDetail;
                    $invoice_detail->invoice_id = $invoice->id;
                    $invoice_detail->description = $disc;
                    $invoice_detail->hours = $request->hours[$key];
                    $invoice_detail->per_hour_price = $request->per_hour_price[$key];
                    $invoice_detail->total = $request->total[$key];
                    $invoice_detail->save();
                }
            }


            \DB::commit();
            return redirect(route('invoice.list'))->with('status', 'Invoice updated successfully!');
        } catch (\Exception $exception) {
            \DB::rollback();
            return redirect()->back()->withInput(request()->input())->with('error', $exception->getMessage());
        } catch (\Throwable $exception) {
            \DB::rollback();
            return redirect()->back()->withInput(request()->input())->with('error', $exception->getMessage());
        }
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
            return redirect(route('invoices.list'))->with('error', 'Opps! there is some problem.');
        }

        $invoice = Invoice::find($id);

        if (is_object($invoice)) {
            $invoice->delete();
            return redirect(route('invoice.list'))->with('status', 'Record deleted successfully.');
        }

        return redirect(route('invoice.list'))->with('error', 'Opps! there is some problem.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        if (!$id) {
            return redirect(route('invoices.list'))->with('error', 'Opps! there is some problem.');
        }

        $invoice = Invoice::find($id);
        if ($invoice->billing_type == "fixed") {
            $total = $invoice->cost;
            $sub_total = checkTaxableAmount($total, $invoice->applicable_tax_percentage);
            $total = $total + $sub_total;
        } else {
            $invoice_detail = $invoice->invoiceDetail;
            $itotal = $invoice_detail->pluck('total')->toArray();
            $total = array_sum($itotal);
            $sub_total = checkTaxableAmount($total, $invoice->applicable_tax_percentage);
            $total = $total + $sub_total;
        }

        $data = array(
            'invoice' => $invoice, 
            'total' => $total,
            'sub_total' => $sub_total
        );

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(\View::make('invoices.download')->with('data', $data)->render());
        $pdf_path = $invoice->number . '.pdf';
        $mpdf->Output($pdf_path, 'd');

        return redirect(route('invoices.list'))->with('status', 'Invoice Download successfully.');
    }

    public function getDetails($id)
    {
        $invoice = Invoice::find($id);
        $invoice_detail = $invoice->invoiceDetail->pluck('total')->toArray();
        $total = array_sum($invoice_detail);
        $data = array(
            'total' => $total,
            'invoice' => $invoice
        );
        return $data;
    }

}
