@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header flex-sb">
                <div><i class="fa fa-table"></i> Income</div>
                <div>
                    <a href="{{ route('income.add') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Add New</a>
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
                                <th>Type</th>
                                <th>Date Of Transaction</th>
                                <th>Bank</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($incomes))
                                @foreach ($incomes as $income)                                    
                                    <tr>
                                        <td>{{ $income->invoice_number }}</td>
                                        <td>{{ ucfirst($income->type) }}</td>
                                        <td>{{ $income->date_of_transaction }}</td>
                                        @if ($income->bank_id)
                                        <td>{{ $income->bank->bank_name }}</td>
                                        @else
                                        <td>-</td>
                                        @endif
                                        <td>{{ $income->amount }}</td>
                                        <td>{{ ucfirst($income->status) }}</td>
                                        <td>
                                            <a href="{{route('income.edit', $income->id)}}"><i class="icon-pencil icons"></i></a>
                                            <a href="{{route('income.delete', $income->id)}}"><i class="icon-trash icons"></i></a>
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