@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header flex-sb">
                <div><i class="fa fa-table"></i> Invoices</div>
                <div>
                    <a href="{{ route('invoice.add') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Add New</a>
                </div>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <div class="alert-icon">
                            <i class="fa fa-check"></i>
                        </div>
                        <div class="alert-message">
                            <span><strong>{{ session('status') }}</strong></span>
                        </div>
                    </div>
                @endif
                @if($errors->any())
                    @foreach ($errors->all() as $msg)
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <div class="alert-icon">
                                <i class="fa fa-times"></i>
                            </div>
                            <div class="alert-message">
                                <span><strong>{{ $msg }}</strong></span>
                            </div>
                        </div>
                    @endforeach
                @endif
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered my-4">
                        <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Date</th>
                                <th>Due Date</th>
                                <th>Client</th>
                                <th>Billing Type</th>
                                <th>Applicable Tax Percentage</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($invoices))
                                @foreach ($invoices as $invoice)                                    
                                    <tr>
                                        {{-- <td>{{ $invoice->id }}</td> --}}
                                        <td>{{ $invoice->number }}</td>
                                        <td>{{ date_format(date_create($invoice->date),"d M Y") }}</td>
                                        <td>{{ date_format(date_create($invoice->due_date),"d M Y") }}</td>
                                        @if (is_object($invoice->client))
                                            <td>{{ $invoice->client->name }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>{{ Str::ucfirst($invoice->billing_type) }}</td>
                                        <td>{{ $invoice->applicable_tax_percentage }}</td>
                                        @if ($invoice->cost)
                                            <td>{{ $invoice->cost }}</td>
                                        @else
                                            <td>{{ array_sum($invoice->invoiceDetail->pluck('total')->toArray()) }}</td>
                                        @endif
                                        <td>{{ Str::ucfirst($invoice->status) }}</td>
                                        <td>
                                            <a href="{{route('invoice.edit', $invoice->id)}}"><i class="icon-pencil icons"></i></a>
                                            <a href="{{route('invoice.delete', $invoice->id)}}"><i class="icon-trash icons"></i></a>
                                            <a href="{{route('invoice.download', $invoice->id)}}"><i class="icon-printer icons"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection