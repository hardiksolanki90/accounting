@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header flex-sb">
                <div><i class="fa fa-table"></i> Bank</div>
                <div>
                <a href="{{ route('bank.add') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Add New</a>
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
                                <th>Account Name</th>
                                <th>Account Number</th>
                                <th>Bank Name</th>
                                <th>Bank Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($banks))
                                @foreach ($banks as $bank)                                    
                                    <tr>
                                        <td>{{ $bank->account_name }}</td>
                                        <td>{{ $bank->account_number }}</td>
                                        <td>{{ $bank->bank_name }}</td>
                                        <td>{{ $bank->bank_address }}</td>
                                        <td>
                                            <a href="{{route('bank.edit', $bank->id)}}"><i class="icon-pencil icons"></i></a>
                                            <a href="{{route('bank.delete', $bank->id)}}"><i class="icon-trash icons"></i></a>
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