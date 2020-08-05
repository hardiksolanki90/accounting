@extends('layouts.auth')

@section('content')

<div class="card-authentication2 mx-auto my-5">
    <div class="card-group">
       <div class="card mb-0">
          <div class="bg-signin2"></div>
          <div class="card-img-overlay rounded-left my-5">
             <h2 class="text-white">Suposa</h2>
             <h1 class="text-white">Invoicing</h1>
             <p class="card-text text-white pt-3">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
          </div>
       </div>
       <div class="card mb-0 ">
          <div class="card-body">
             <div class="card-content p-3">
                <div class="text-center">
                <img src="{{ asset('images/footer-logo.png') }}" alt="logo icon" style="width: 100px">
                </div>
                <div class="card-title text-uppercase text-center py-3">Sign In</div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                   <div class="form-group">
                      <div class="position-relative has-icon-left">
                         <label for="email" class="">Username</label>
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                         @error('email')
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
                        <label for="email" class="">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                   <div class="form-row mr-0 ml-0">
                      <div class="form-group col-6">
                         <div class="icheck-material-primary">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="user-checkbox">Remember me</label>
                         </div>
                      </div>
                      <div class="form-group col-6 text-right">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                        @endif
                      </div>
                   </div>
                   <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Log In</button>
                </form>
             </div>
          </div>
       </div>
    </div>
 </div>


{{--
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
--}}
@endsection
