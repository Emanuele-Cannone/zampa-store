<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="name">@lang('common.name') *</label>
                    <input type="text" id="name" name="name" value="{{ isset($customer) ? $customer->name : old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required >
                    <small class="text-danger">@error('name') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="email">@lang('common.email') *</label>
                    <input type="email" id="email" name="email" value="{{ isset($customer) ? $customer->email : old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           required >
                    <small class="text-danger">@error('email') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="phoneNumber">@lang('common.phone_number')</label>
                    <input type="text" id="phoneNumber" name="phone_number" value="{{ isset($customer) ? $customer->phone_number : old('phone_number') }}"
                           class="form-control @error('phone_number') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" >
                    <small class="text-danger">@error('phone_number') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>
