@extends('layouts.default')
@section('content')
<div class="row">
    <div class="col-lg-12">
      <div class="card">
         <div class="card-header flex-sb">
            <div><i class="fa fa-table"></i> {{ $income->id ?  'Edit income '. $income->account_name : "Add income" }}</div>
            <div>
            <a href="{{ route('income.list') }}" class="btn btn-outline-primary btn-sm btn-square waves-effect waves-light">Income List</a>
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
        <form method="POST" action="@if ($income->id) {{ route('income.edit', $income->id) }} @else {{ route('income.add') }} @endif" id="personal-info">
            @csrf
            <div class="form-group">
               <div class="position-relative has-icon-left">
                  <label for="invoice_number" class="">Invoice Number</label>
                   <select required name="invoice_number" class="select_search form-control @error('invoice_number') is-invalid @enderror" id="invoice_number" {{ $income->invoice_id ? 'disabled' : '' }}>
                       <option readonly>Choose Invoice Number</option>
                       @if (count($invoice))
                          @foreach ($invoice as $i)
                             <option value="{{ $i->id }}" {{ $i->id == $income->invoice_id ? 'selected' : '' }}>{{ getInvoiceCombination($i->id) }}</option>
                          @endforeach
                       @endif
                   </select>
                  @error('bank_id')
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
                   <label for="amount" class="">Amount</label>
                   <input id="amount" type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{ old('amount', $income->amount) }}" required placeholder="Amount" autocomplete="amount" autofocus>
                   @error('amount')
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
                   <label for="date_of_transaction" class="">Date of Transaction</label>
                   <input id="date_of_transaction" type="date" maxlength="25" class="form-control @error('date_of_transaction') is-invalid @enderror" name="date_of_transaction" value="{{ old('date_of_transaction', $income->date_of_transaction) }}" required placeholder="Date of Transaction" autocomplete="date_of_transaction" autofocus>
                   @error('date_of_transaction')
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
                   <label for="type" class="">Type</label>
                    <select required name="type" class="select_search bil_type form-control @error('type') is-invalid @enderror" id="type">
                     <option value="bank" {{ $income->type == 'bank' ? 'selected' : '' }}>Bank</option>
                     <option value="cash" {{ $income->type == 'cash' ? 'selected' : '' }}>Cash</option>
                    </select>
                   @error('type')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-graph icons"></i>
                   </div>
                </div>
             </div>

            <div class="form-group bank_detail" style="{{ $income->type == 'bank' ? '' : 'display:none' }}" >
                <div class="position-relative has-icon-left">
                   <label for="type" class="">Bank</label>
                    <select required name="bank_id" class="select_search form-control @error('bank_id') is-invalid @enderror" id="bank_id">
                        <option readonly>Choose Bank</option>
                        @if (count($banks))
                           @foreach ($banks as $bank)
                              <option value="{{ $bank->id }}" {{ $bank->id == $income->bank_id ? 'selected' : '' }}>{{ $bank->bank_name }}</option>
                           @endforeach
                        @endif
                    </select>
                   @error('bank_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                   <div class="form-control-position">
                      <i class="icon-graph icons"></i>
                   </div>
               </div>
            </div>

             <div class="form-group bank_detail" style="{{ $income->type == 'bank' ? '' : 'display:none' }}">
               <div class="position-relative has-icon-left">
                  <label for="transaction_id" class="">Transaction Number</label>
                  <input id="transaction_id" type="text" class="form-control @error('transaction_id') is-invalid @enderror" name="transaction_id" value="{{ old('transaction_id', $income->transaction_id) }}" placeholder="Transaction Number" autocomplete="transaction_id" autofocus>
                  @error('transaction_id')
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
                  <label for="status" class="">status</label>
                   <select required name="status" class="select_search form-control @error('status') is-invalid @enderror" id="status">
                        <option readonly>Choose status</option>
                        <option value="pending" {{ $income->status == "pending" ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $income->status == "completed" ? 'selected' : '' }}>Completed</option>
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

             <input type="hidden" class="rate" value="">
             <div class="form-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> SAVE</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection