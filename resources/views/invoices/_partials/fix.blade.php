<div class="row">
    <div class="form-group col-md-6">
        <div class="position-relative has-icon-left">
        <label for="fdescription" class="">Description</label>
        <input id="fdescription" type="text" class="form-control @error('fdescription') is-invalid @enderror" name="fdescription" value="{{ old('fdescription', $invoice->fdescription) }}" required placeholder="Description" autocomplete="fdescription" autofocus>
        @error('fdescription')
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
        <label for="cost" class="">Cost</label>
        <input id="cost" type="text" class="cost form-control @error('cost') is-invalid @enderror" name="cost" value="{{ old('cost', $invoice->cost) }}" required placeholder="Cost" autocomplete="cost" autofocus>
        @error('cost')
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
