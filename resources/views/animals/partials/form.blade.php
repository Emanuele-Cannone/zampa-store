@section('adminlte_js')
    <script type="module">
        $(document).ready(function () {

            $('#customer').select2({
                data: @js($customers),
                search: true
            });

            $('#animalBreed').select2({
                data: @js($animals),
                multiple: false,
                search: true
            });

            $("[name='is_sterilized']").bootstrapSwitch({
                onColor: 'success',
                offColor: 'default',
                onText: 'Si',
                offText: 'No',
                labelText: "@lang('common.sterilized')",
            });

            $('#birth').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1901,
                locale: {
                    format: 'DD-MM-YYYY'
                }
            })
        });
    </script>
@endsection

@section('adminlte_css')
    <style>
        li.select2-results__option {
            display: block !important;
        }

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
                    <label for="birth">@lang('common.birth')</label>
                    <input id="birth" name="birth"
                           value="{{ isset($animal) ? Carbon\Carbon::createFromFormat('Y-m-d',$animal->birth)->format('d-m-Y') : old('birth') }}"
                           class="form-control @error('birth') is-invalid @enderror">
                    <small class="text-danger">@error('birth') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="animalBreed">@lang('common.breed')</label>
                <select id="animalBreed" class="w-100" name="breed_id">
                </select>
            </div>
            <div class="form-group col-sm-4">
                <label for="customer">@lang('common.customer')</label>
                <select id="customer" class="w-100" name="customer_id">
                </select>
            </div>
        </div>
        <div class="row mt-3">
            <div class="form-group col-sm-4">
                <input type="checkbox" name="is_sterilized" data-bootstrap-switch=""
                       class="form-control @error('is_sterilized') is-invalid @enderror"
                    @checked(old('is_sterilized', isset($animal) && $animal->is_sterilized ?? $animal->is_sterilized)) >
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>
