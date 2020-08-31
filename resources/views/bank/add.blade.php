@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header flex-sb">
            <div><i class="fa fa-table"></i> {{ $bank->id ?  'Edit Bank '. $bank->account_name : "Add bank" }}</div>
            <div>
            <a href="{{ route('bank.list') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Bank List</a>
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
        <form method="POST" action="@if ($bank->id) {{ route('bank.edit', $bank->id) }} @else {{ route('bank.add') }} @endif" id="personal-info" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="account_name" class="">Account Name</label>
                   <input id="account_name" type="text" class="form-control @error('account_name') is-invalid @enderror" name="account_name" value="{{ old('account_name', $bank->account_name) }}" required placeholder="Account Name" autocomplete="account_name" autofocus>
                   @error('account_name')
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
                   <label for="account_number" class="">Account Number</label>
                   <input id="account_number" type="tel" maxlength="25" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number', $bank->account_number) }}" required placeholder="Account Number" autocomplete="account_number" autofocus>
                   @error('account_number')
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
                   <label for="bank_name" class="">Bank Name</label>
                   <input id="bank_name" type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name', $bank->bank_name) }}" required placeholder="Bank Name" autocomplete="bank_name" autofocus>
                   @error('bank_name')
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
                   <label for="bank_address" class="">Bank Address</label>
                   <input id="bank_address" type="text" class="form-control @error('address') is-invalid @enderror" name="bank_address" value="{{ old('bank_address', $bank->bank_address) }}" required placeholder="Bank Address" autocomplete="bank_address" autofocus>
                   @error('bank_address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-home icons"></i>
                   </div>
                </div>
             </div>

             <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="description" class="">Description</label>
                <textarea name="description" placeholder="Description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" id="basic-textarea">{{ old('description', $bank->description) }}</textarea>
                   @error('description')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
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