@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header flex-sb">
                <div><i class="fa fa-table"></i>
                    {{ $setting->id ?  'Edit setting '. $setting->account_name : "Add setting" }}</div>
                <div>
                    <a href="{{ route('setting.list') }}"
                        class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Setting List</a>
                </div>
            </div>
            <div class="card-body">
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
                <form method="POST" action="@if ($setting->id) {{ route('setting.edit', $setting->id) }} @else {{ route('setting.add') }} @endif"
                    id="personal-info" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="position-relative has-icon-left">
                                <label for="name" class="">Name</label>
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $setting->name) }}" required placeholder="Name"
                                    autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="position-relative has-icon-left">
                                <label for="address" class="">Address</label>
                                <input id="address" type="text"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address', $setting->address) }}" required placeholder="Address"
                                    autocomplete="address" autofocus>
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group col-md-6">
                            <div class="position-relative has-icon-left">
                                <label for="city" class="">City</label>
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                                    name="city" value="{{ old('city', $setting->city) }}" required placeholder="City"
                                    autocomplete="city" autofocus>
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="position-relative has-icon-left">
                                <label for="state" class="">State</label>
                                <input id="state" type="text" maxlength="30"
                                    class="form-control @error('state') is-invalid @enderror" name="state"
                                    value="{{ old('state', $setting->state) }}" required placeholder="State"
                                    autocomplete="state" autofocus>
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="position-relative has-icon-left">
                                <label for="zip" class="">Zip</label>
                                <input id="zip" type="text" maxlength="6"
                                    class="form-control @error('zip') is-invalid @enderror" name="zip"
                                    value="{{ old('zip', $setting->zip) }}" required placeholder="Zip"
                                    autocomplete="zip" autofocus>
                                @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <div class="form-control-position">
                                    <i class="icon-user"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="path" class="col-sm-3 col-form-label">Upload</label>
                        <input type="file" class="form-control file" name="logo" accept="image/*" />
                        @if ($setting->logo)
                            <img src="{{ $setting->logo }}" alt="logo" width="250" height="250">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="path" class="col-sm-3 col-form-label">PDF Logo</label>
                        <input type="file" class="form-control file" name="pdf_logo" accept="image/*" />
                        @if ($setting->pdf_logo)
                            <img src="{{ $setting->pdf_logo }}" alt="pdf_logo" width="250" height="250">
                        @endif
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection