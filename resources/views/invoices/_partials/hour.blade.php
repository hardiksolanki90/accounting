@if (isset($detail->id))
<div class="row">
    <div class="form-group col-md-4">
        <div class="position-relative has-icon-left">
        <label for="description" class="">description</label>
        {{ $detail->description }}
        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description[]" value="{{ $detail->description }}" required placeholder="Description" autocomplete="description" autofocus>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-control-position">
            <i class="icon-user"></i>
        </div>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="position-relative has-icon-left">
        <label for="hours" class="">hours</label>
        {{ $detail->hours }}
        <input id="hours" type="text" class="in_hours form-control @error('hours') is-invalid @enderror" name="hours[]" value="{{ $detail->hours }}"  required placeholder="Hours" autocomplete="hours" autofocus>
        @error('hours')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-control-position">
            <i class="icon-user"></i>
        </div>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="position-relative has-icon-left">
        <label for="per_hour_price" class="">per hour price</label>
        {{ $detail->per_hour_price }}
        <input id="per_hour_price" type="text" class="per_hour_price form-control @error('per_hour_price') is-invalid @enderror" name="per_hour_price[]" value="{{ $detail->per_hour_price }}" required placeholder="Per Hour Price" autocomplete="per_hour_price" autofocus>
        @error('per_hour_price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-control-position">
            <i class="icon-user"></i>
        </div>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="position-relative has-icon-left">
        <label for="total" class="">total</label>
        {{ $detail->total }}
        <input id="total" type="text" class="in_total form-control @error('total') is-invalid @enderror" name="total[]" value="{{ $detail->total }}" required placeholder="Total" autocomplete="total" autofocus>
        @error('total')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-control-position">
            <i class="icon-user"></i>
        </div>
        </div>
    </div>
    <div class="form-group col-md-2 deletetbtn">
        <button type="button" class="btn remove btn-danger waves-effect waves-light m-1"> <i class="fa fa fa-trash-o"></i> <span>Delete</span> </button>
    </div>
</div>
@else
<div class="row">
    <div class="form-group col-md-4">
        <div class="position-relative has-icon-left">
        <label for="description" class="">description</label>
        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description[]" value="{{ old('description[]') }}" required placeholder="Description" autocomplete="description" autofocus>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-control-position">
            <i class="icon-user"></i>
        </div>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="position-relative has-icon-left">
        <label for="hours" class="">hours</label>
        <input id="hours" type="text" class="in_hours form-control @error('hours') is-invalid @enderror" name="hours[]" value="{{ old('hours[]') }}" min="00:00" max="24:00" required placeholder="Hours" autocomplete="hours" autofocus>
        @error('hours')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-control-position">
            <i class="icon-user"></i>
        </div>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="position-relative has-icon-left">
        <label for="per_hour_price" class="">per hour price</label>
        <input id="per_hour_price" type="text" class="per_hour_price form-control @error('per_hour_price') is-invalid @enderror" name="per_hour_price[]" value="{{ old('per_hour_price[]') }}" required placeholder="Per Hour Price" autocomplete="per_hour_price" autofocus>
        @error('per_hour_price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-control-position">
            <i class="icon-user"></i>
        </div>
        </div>
    </div>
    <div class="form-group col-md-2">
        <div class="position-relative has-icon-left">
        <label for="total" class="">total</label>
        <input id="total" type="text" class="in_total form-control @error('total') is-invalid @enderror" name="total[]" value="{{ old('total[]') }}" required placeholder="Total" autocomplete="total" autofocus>
        @error('total')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <div class="form-control-position">
            <i class="icon-user"></i>
        </div>
        </div>
    </div>
    <div class="form-group col-md-2 deletetbtn">
        <button type="button" class="btn remove btn-danger waves-effect waves-light m-1"> <i class="fa fa fa-trash-o"></i> <span>Delete</span> </button>
    </div>
</div>
@endif