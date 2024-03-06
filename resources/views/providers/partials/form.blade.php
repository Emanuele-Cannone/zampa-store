<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-sm-6">
                <div class="form-group">
                    <label for="companyName">@lang('common.company_name') *</label>
                    <input type="text" id="companyName" name="company_name"
                           value="{{ isset($provider) ? $provider->company_name : old('company_name') }}"
                           class="form-control @error('company_name') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('company_name') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-6">
                <div class="form-group">
                    <label for="address">@lang('common.address') *</label>
                    <input type="text" id="address" name="address"
                           value="{{ isset($provider) ? $provider->address : old('address') }}"
                           class="form-control @error('address') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('address') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="city">@lang('common.city') *</label>
                    <input type="text" id="city" name="city"
                           value="{{ isset($provider) ? $provider->city : old('city') }}"
                           class="form-control @error('city') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('city') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="postalCode">@lang('common.postal_code') *</label>
                    <input type="text" id="postalCode" name="postal_code"
                           value="{{ isset($provider) ? $provider->postal_code : old('postal_code') }}"
                           class="form-control @error('postal_code') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('postal_code') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="country">@lang('common.country') *</label>
                    <input type="text" id="country" name="country"
                           value="{{ isset($provider) ? $provider->country : old('country') }}"
                           class="form-control @error('country') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('country') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="fiscalCode">@lang('common.fiscal_code') *</label>
                    <input type="text" id="fiscalCode" name="fiscal_code"
                           value="{{ isset($provider) ? $provider->fiscal_code : old('fiscal_code') }}"
                           class="form-control @error('fiscal_code') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('fiscal_code') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="pIva">@lang('common.p_iva') *</label>
                    <input type="text" id="pIva" name="p_iva"
                           value="{{ isset($provider) ? $provider->p_iva : old('p_iva') }}"
                           class="form-control @error('p_iva') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('p_iva') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="iban">@lang('common.iban')</label>
                    <input type="text" id="iban" name="iban"
                           value="{{ isset($provider) ? $provider->iban : old('iban') }}"
                           class="form-control @error('iban') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('iban') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="email">@lang('common.email') *</label>
                    <input type="email" id="email" name="email"
                           value="{{ isset($provider) ? $provider->email : old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('email') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="pec">@lang('common.pec')</label>
                    <input type="email" id="pec" name="pec" value="{{ isset($provider) ? $provider->pec : old('pec') }}"
                           class="form-control @error('pec') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('pec') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="telephone">@lang('common.telephone')</label>
                    <input type="text" id="telephone" name="telephone"
                           value="{{ isset($provider) ? $provider->telephone : old('telephone') }}"
                           class="form-control @error('telephone') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('telephone') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="other_contact">@lang('common.other_contact')</label>
                    <input type="text" id="other_contact" name="other_contact"
                           value="{{ isset($provider) ? $provider->other_contact : old('other_contact') }}"
                           class="form-control @error('other_contact') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('other_contact') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>
