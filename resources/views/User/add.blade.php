@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
         <div class="card-header flex-sb">
            <div><i class="fa fa-table"></i> {{ $user->id ?  'Edit user '. $user->name : "Add User" }}</div>
            <div>
            <a href="{{ route('user.list') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">User List</a>
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
        <form method="POST" action="@if ($user->id) {{ route('user.edit', $user->id) }} @else {{ route('user.add') }} @endif" id="personal-info">
            @csrf
            <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="name" class="">Name</label>
                   <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required placeholder="Name" autocomplete="name" autofocus>
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

             <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="email" class="">Email</label>
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required placeholder="Email" autocomplete="email" autofocus {{ $user->id ? 'disabled' : '' }}>
                   @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-envelope-open"></i>
                   </div>
                </div>
             </div>
             @if (!$user->id)
             <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="password" class="">Password</label>
                   <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required placeholder="password" autocomplete="password" autofocus>
                   @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-lock"></i>
                   </div>
                </div>
             </div>
            @endif
            <div class="form-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection