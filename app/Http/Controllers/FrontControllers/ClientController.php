<?php

namespace App\Http\Controllers\FrontControllers;

use App\Http\Controllers\Controller;
use App\Model\Client;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
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
        $clients = Client::get();

        return view('client.list', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client;
        return view('client.add', compact('client'));
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
            'name' => 'required|max:191',
            'email' => 'required|unique:users|max:191',
            'address' => 'required|max:191',
            'hourly_rate' => 'required|numeric',
            'applicable_tax_percentage' => 'numeric',
            'billing_currency' => 'required',
            'company_name' => 'required',
            'description' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withInput(request()->input())->withErrors($validator);
        }
        
        $client = new Client;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->address = $request->address;
        $client->hourly_rate = $request->hourly_rate;
        $client->billing_currency = $request->billing_currency;
        $client->company_name = $request->company_name;
        $client->description = $request->description;
        $client->applicable_tax_percentage = $request->applicable_tax_percentage;
        $client->created_by= Auth::user()->id;
        $client->modified_by= Auth::user()->id;
        $client->save();

        return redirect(route('client.list'))->with('status', 'Client saved successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$id) {
            return redirect(route('client.list'))->withErrors(array('Opps! there is some problem.'));
        }

        $client = Client::find($id);   
        return view('client.add', compact('client'));
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
        if (!$id) {
            return redirect(route('client.list'))->withErrors(array('Opps! there is some problem.'));
        }
        
        $validator = \Validator::make(request()->input(), [
            'name' => 'required|max:191',
            'address' => 'required|max:191',
            'hourly_rate' => 'required|numeric',
            'applicable_tax_percentage' => 'numeric',
            'billing_currency' => 'required',
            'company_name' => 'required',
            'description' => 'required'
        ]);
                
        if($validator->fails())
        {
            return redirect()->back()->withInput(request()->input())->withErrors($validator);
        }

        $client = Client::find($id);
        $client->name = $request->name;
        // $client->email = $request->email;
        $client->address = $request->address;
        $client->hourly_rate = $request->hourly_rate;
        $client->billing_currency = $request->billing_currency;
        $client->company_name = $request->company_name;
        $client->description = $request->description;
        $client->applicable_tax_percentage = $request->applicable_tax_percentage;
        // $client->created_by= Auth::user()->id;
        $client->modified_by= Auth::user()->id;
        $client->save();

        return redirect(route('client.list'))->with('status', 'Client updated successfully!');
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
            return redirect(route('client.list'))->withErrors(array('Opps! there is some problem.'));
        }

        $client = Client::find($id);

        if (is_object($client)) {
            $client->delete();
            return redirect(route('client.list'))->with('status', 'Record deleted successfully.');
        }

        return redirect(route('client.list'))->with('error', 'Opps! there is some problem.');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDetails($id)
    {
        $client = Client::find($id);
        return $client;
    }
}
