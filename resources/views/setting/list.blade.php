@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header flex-sb">
                <div><i class="fa fa-table"></i> Setting</div>
                @if (!is_object($setting))
                <div>
                    <a href="{{ route('setting.add') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Add New</a>
                </div>
                @endif
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
                                <th>Name</th>
                                <th>Logo</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $setting->name }}</td>
                                <td>
                                    @if (model($setting, 'logo'))
                                        <img src="{{ model($setting, 'logo') }}" alt="logo" width="50" height="50">
                                    @endif
                                </td>
                                <td>{{ model($setting, 'address') }}</td>
                                <td>{{ model($setting, 'city') }}</td>
                                <td>{{ model($setting, 'state') }}</td>
                                <td>{{ model($setting, 'zip') }}</td>
                                <td>
                                    @if (model($setting,'id'))
                                    <a href="{{route('setting.edit', $setting->id)}}"><i
                                            class="icon-pencil icons"></i></a>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection