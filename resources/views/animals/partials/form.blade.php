@section('adminlte_js')
    <script type="module">
        $(document).ready(function () {

            $('#customerAnimal').select2({
                data: @js($customers),
                multiple: false,
                search: true,
                allowClear: true,
                placeholder: {
                    id: '-1',
                    text: "@lang('common.enter_value')"
                }
            });

            $("[name='is_sterilized']").bootstrapSwitch({
                onColor: 'success',
                offColor: 'default',
                onText: 'Si',
                offText: 'No',
                labelText: "@lang('common.sterilized')",
            });
        });
    </script>
@endsection

@section('adminlte_css')
    <style>
        .select2-selection.select2-selection--single,
        .select2-selection.select2-selection--multiple {
            height: 38px !important;
            border: 1px solid #ced4da !important;
        }

        .select2-selection__arrow {
            display: none;
        }

        .select2-selection__choice {
            color: #495057 !important;
        }
    </style>
@endsection


<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="name">@lang('common.name') *</label>
                    <input type="text" id="name" name="name" value="{{ isset($animal) ? $animal->name : old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
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
                <label for="customerAnimal">@lang('common.breed')</label>
                <select id="customerAnimal" class="w-100" name="customer_id">
                    <option value="" disabled selected>@lang('common.enter_value')</option>
                </select>
            </div>
            <div class="form-group col-sm-4">
                <input type="checkbox" name="is_sterilized" data-bootstrap-switch="" value="1"
                    class="form-control @error('is_sterilized') is-invalid @enderror"
                    {{ isset($animal) && $animal->is_sterilized ? 'checked' : '' }} >
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>


