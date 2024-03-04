@section('adminlte_js')
    <script type="module">
        $(document).ready(function () {
            $('#animalTypology').select2({
                data: @js($typologies),
                multiple: false,
                search: true
            });
        });
    </script>
@endsection

@section('adminlte_css')
    <style>
        .select2-results__option {
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
                    <input type="text" id="name" name="name" value="{{ isset($breed) ? $breed->name : old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('name') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="animalTypology">@lang('common.breed')</label>
                <select id="animalTypology" class="w-100" name="animal_typology_id">
                </select>
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>
