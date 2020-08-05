@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header flex-sb">
            <div><i class="fa fa-table"></i> {{ $invoice->id ?  'Edit invoice '. $invoice->account_name : "Add invoice" }}</div>
            <div>
            <a href="{{ route('invoice.list') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Invoice List</a>
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
        <form method="POST" action="@if ($invoice->id) {{ route('invoice.edit', $invoice->id) }} @else {{ route('invoice.add') }} @endif" id="personal-info" novalidate="novalidate">
            @csrf
            <div class="form-group">
                <div class="position-relative has-icon-left">
                    <label for="invoice_number" class="">Invoice Number</label>
                    @if (!isset($invoice->id))
                        <input id="invoice_number" type="text" class="form-control @error('invoice_number') is-invalid @enderror" name="invoice_number" value="{{ $last_number }}" required placeholder="Invoice Number" autocomplete="invoice_number" readonly autofocus>
                    @else
                        <input id="invoice_number" type="text" class="form-control @error('invoice_number') is-invalid @enderror" name="invoice_number" value="{{ old('invoice_number', $invoice->number) }}" required placeholder="Invoice Number" autocomplete="invoice_number" autofocus>
                    @endif
                    @error('invoice_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <div class="form-control-position">
                        <i class="icon-user"></i>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <div class="position-relative has-icon-left">
                       <label for="date" class="">Invoice Date</label>
                       <input id="date" type="date" maxlength="25" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date', $invoice->date) }}" required placeholder="Date" autocomplete="date" autofocus>
                       @error('date')
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
                       <label for="due_date" class="">Due Date</label>
                       <input id="due_date" type="date" maxlength="25" class="form-control @error('due_date') is-invalid @enderror" name="due_date" value="{{ old('due_date', $invoice->due_date) }}" required placeholder="Due Date" autocomplete="due_date" autofocus>
                       @error('due_date')
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
                <div class="position-relative has-icon-left">
                   <label for="client_id" class="">Client</label>
                    <select required name="client_id" class="select_search form-control @error('client') is-invalid @enderror" id="client_id">
                        <option readonly>Choose Client</option>
                        @if (count($clients))
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}" {{ $client->id == $invoice->client_id ? 'selected' : '' }}>{{ $client->name }}</option>
                            @endforeach
                        @endif
                    </select>
                   @error('client_id')
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
                   <label for="billing_type" class="">Billing Type</label>
                    <select required name="billing_type" class="select_search form-control @error('billing_type') is-invalid @enderror" id="billing_type">
                      <option value="fixed" {{ old('fixed') }} {{ $invoice->billing_type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                      <option value="hourly" {{ old('hourly') }} {{ $invoice->billing_type == 'hourly' ? 'selected' : '' }}>Hourly</option>
                    </select>
                   @error('billing_type')
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
                   <label for="status" class="">status</label>
                    <select required name="status" class="select_search form-control @error('status') is-invalid @enderror" id="status">
                      <option disabled>Choose Status</option>
                      <option value="billed" {{ old('billed') }} {{ $invoice->status == 'billed' ? 'selected' : '' }}>Billed</option>
                      <option value="completed" {{ old('completed') }} {{ $invoice->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                   @error('status')
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
                   <label for="applicable_tax_percentage" class="">Applicable Tax Percentage</label>
                   <input id="applicable_tax_percentage" type="text" class="form-control @error('applicable_tax_percentage') is-invalid @enderror" name="applicable_tax_percentage" value="{{ old('applicable_tax_percentage', $invoice->applicable_tax_percentage) }}" required placeholder="Applicable tax percentage" autocomplete="applicable_tax_percentage" autofocus>
                   @error('applicable_tax_percentage')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-user"></i>
                   </div>
                </div>
             </div>
             <div class="cloneData">
                 @if (count($invoice->invoiceDetail))
                    @foreach ($invoice->invoiceDetail as $detail)
                        <div class="hours" >
                            @include('invoices._partials.hour', $detail)
                        </div>
                    @endforeach
                @else
                <div class="fix admr">
                    @include('invoices._partials.fix', $invoice)
                </div>
                <div class="hours admr" style="display: none">
                    @include('invoices._partials.hour')
                </div>
                @endif
                <div class="new-column"></div>
                <div class="form-group addMoreWrap"  style="display: none">
                    <button type="button" class="btn addMore btn-info waves-effect waves-light m-1"> <i class="fa fa-plus-square-o"></i> <span>Add More</span> </button>
                </div>
             </div>
             <input type="hidden" class="rate">
             <div class="form-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection