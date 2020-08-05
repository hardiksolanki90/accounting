@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header flex-sb">
                <div><i class="fa fa-table"></i> Clients</div>
                <div>
                <a href="{{ route('client.add') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Add New</a>
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
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <div class="alert-icon">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="alert-message">
                            <span><strong>{{ session('error') }}</strong></span>
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered my-4">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Hourly Rate</th>
                                <th>Billing Currency</th>
                                <th>Company Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($clients))
                                @foreach ($clients as $u)                                    
                                    <tr>
                                        <td>{{ $u->name }}</td>
                                        <td>{{ $u->email }}</td>
                                        <td>{{ $u->address }}</td>
                                        <td>{{ $u->hourly_rate }}</td>
                                        <td>{{ $u->billing_currency }}</td>
                                        <td>{{ $u->company_name }}</td>
                                        <td>
                                            <a href="{{route('client.edit', $u->id)}}"><i class="icon-pencil icons"></i></a>
                                            <a href="{{route('client.delete', $u->id)}}"><i class="icon-trash icons"></i></a>
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