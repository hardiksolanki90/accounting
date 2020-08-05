@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
         <div class="card-header flex-sb">
            <div><i class="fa fa-table"></i> {{ $client->id ?  'Edit client '. $client->name : "Add client" }}</div>
            <div>
            <a href="{{ route('client.list') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Client List</a>
            </div>
        </div>
        <div class="card-body">
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
        <form method="POST" action="@if ($client->id) {{ route('client.edit', $client->id) }} @else {{ route('client.add') }} @endif" id="personal-info" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="name" class="">Name</label>
                   <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $client->name) }}" required placeholder="Name" autocomplete="name" autofocus>
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
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $client->email) }}" required placeholder="Email" autocomplete="email" autofocus>
                   @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-envelope-open icons"></i>
                   </div>
                </div>
             </div>
            
             <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="address" class="">Address</label>
                   <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $client->address) }}" required placeholder="Address" autocomplete="address" autofocus>
                   @error('address')
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
                   <label for="hourly_rate" class="">Hourly Rate</label>
                   <input id="hourly_rate" type="tel" class="form-control @error('hourly_rate') is-invalid @enderror" name="hourly_rate" value="{{ old('hourly_rate', $client->hourly_rate) }}" required placeholder="Hourly Rate" autocomplete="hourly_rate" autofocus>
                   @error('hourly_rate')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-clock icons"></i>
                   </div>
                </div>
            </div>
            
            <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="applicable_tax_percentage" class="">Applicable tax percentage</label>
                   <input id="applicable_tax_percentage" type="tel" class="form-control @error('applicable_tax_percentage') is-invalid @enderror" name="applicable_tax_percentage" value="{{ old('applicable_tax_percentage', $client->applicable_tax_percentage) }}" required placeholder="Applicable tax percentage" autocomplete="applicable_tax_percentage" autofocus>
                   @error('applicable_tax_percentage')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-clock icons"></i>
                   </div>
                </div>
            </div>

             <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="billing_currency" class="">Billing Currency</label>
                    <select required name="billing_currency" class="select_search form-control @error('billing_currency') is-invalid @enderror" id="billing_currency">
                      <option value="usd" {{ $client->billing_currency == 'usd' ? 'selected' : '' }}>USD</option>
                      <option value="eur" {{ $client->billing_currency == 'eur' ? 'selected' : '' }}>EUR</option>
                      <option value="inr" {{ $client->billing_currency == 'inr' ? 'selected' : '' }}>INR</option>
                    </select>
                   @error('billing_currency')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-graph icons"></i>
                   </div>
                </div>
             </div>

             <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="company_name" class="">Company Name</label>
                   <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', $client->company_name) }}" required placeholder="Company Name" autocomplete="company_name" autofocus>
                   @error('company_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-people icons"></i>
                   </div>
                </div>
             </div>

             <div class="form-group">
                <div class="position-relative has-icon-left">
                   <label for="description" class="">Description</label>
                <textarea name="description" id="description" rows="3" placeholder="Description" class="form-control @error('description') is-invalid @enderror" id="basic-textarea">{{ old('description', $client->description) }}</textarea>
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