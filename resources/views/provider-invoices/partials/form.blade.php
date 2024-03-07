@section('adminlte_js')
    <script type="module">
        $(document).ready(function () {

            $('#provider').select2({
                data: @js($providers),
                search: true
            });

            $("[name='paid']").bootstrapSwitch({
                onColor: 'success',
                offColor: 'default',
                onText: 'Si',
                offText: 'No',
                labelText: "@lang('common.paid')",
            });

            $('#date').daterangepicker({
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
            <div class="form-group col-sm-2">
                <div class="form-group">
                    <label for="amount">@lang('common.amount') *</label>
                    <input type="number" id="name" name="amount" step="0.01"
                           value="{{ isset($providerInvoice) ? $providerInvoice->amount : old('amount') }}"
                           class="form-control @error('amount') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('amount') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-2">
                <div class="form-group">
                    <label for="date">@lang('common.date')</label>
                    <input id="date" name="date"
                           value="{{ isset($providerInvoice) ? Carbon\Carbon::createFromFormat('Y-m-d',$providerInvoice->date)->format('d-m-Y') : old('date') }}"
                           class="form-control @error('date') is-invalid @enderror">
                    <small class="text-danger">@error('date') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-2">
                <div class="form-group">
                    <label for="invoiceNumber">@lang('common.number')</label>
                    <input id="invoiceNumber" name="number" type="text"
                           value="{{ isset($providerInvoice) ? $providerInvoice->number : old('number') }}"
                           class="form-control @error('date') is-invalid @enderror">
                    <small class="text-danger">@error('date') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="provider">@lang('common.provider')</label>
                <select id="provider" class="w-100" name="provider_id">
                </select>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="form-group col-sm-2">
                <input type="checkbox" name="paid" data-bootstrap-switch=""
                       class="form-control @error('paid') is-invalid @enderror"
                    @checked(isset($providerInvoice) && $providerInvoice->paid ) >
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>
