<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="name">@lang('common.name') *</label>
                    <input type="text" id="name" name="name" value="{{ isset($animal) ? $animal->name : old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('name') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="species">@lang('common.species') *</label>
                    <input type="text" id="species" name="species"
                           value="{{ isset($animal) ? $animal->species : old('species') }}"
                           class="form-control @error('species') is-invalid @enderror"
                           required>
                    <small class="text-danger">@error('species') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="breed">@lang('common.breed')</label>
                    <input type="text" id="breed" name="breed"
                           value="{{ isset($animal) ? $animal->breed : old('breed') }}"
                           class="form-control @error('breed') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('breed') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="birth">@lang('common.birth')</label>
                    <input type="date" id="birth" name="birth"
                           value="{{ isset($animal) ? $animal->birth : old('birth') }}"
                           class="form-control @error('birth') is-invalid @enderror">
                    <small class="text-danger">@error('birth') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="breed">@lang('common.breed')</label>
                    <input type="text" id="breed" name="breed"
                           value="{{ isset($animal) ? $animal->breed : old('breed') }}"
                           class="form-control @error('breed') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('breed') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="sterilized">@lang('common.sterilized')</label>
                <input type="checkbox" id="sterilized" name="is_sterilized" class="switch"
                        {{ isset($animal) && $animal->is_sterilized ? 'checked' : '' }}
                /> @lang('common.sterilized')
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>


