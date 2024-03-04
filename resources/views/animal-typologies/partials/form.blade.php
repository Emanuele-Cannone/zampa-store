<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="name">@lang('common.name') *</label>
                    <input type="text" id="name" name="name" value="{{ isset($animalTypology) ? $animalTypology->name : old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required >
                    <small class="text-danger">@error('name') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>
