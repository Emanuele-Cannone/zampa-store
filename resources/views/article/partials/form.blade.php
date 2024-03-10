@section('adminlte_js')
    <script type="module">
        $(document).ready(function () {
            $("[data-toggle='switch']").bootstrapSwitch();
        });
    </script>
@endsection

<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="ean_code">@lang('article.ean_code') *</label>
                    <input type="text" id="ean_code" name="ean_code"
                           value="{{ isset($article) ? $article->ean_code : old('ean_code') }}"
                           class="form-control @error('ean_code') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required>
                    <small class="text-danger">@error('ean_code') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="product_code">@lang('common.product_code') *</label>
                    <input type="text" id="product_code" name="product_code"
                           value="{{ isset($article) ? $article->product_code : old('product_code') }}"
                           class="form-control @error('product_code') is-invalid @enderror"
                           required>
                    <small class="text-danger">@error('product_code') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="description">@lang('common.description')*</label>
                    <input type="text" id="description" name="description"
                           value="{{ isset($article) ? $article->description : old('description') }}"
                           class="form-control @error('description') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')">
                    <small class="text-danger">@error('description') {{ $message }}@enderror</small>
                </div>
            </div>

            <div class="form-group col-sm-4">
                <input type="checkbox" name="is_active" data-toggle="switch"
                       data-on-color="success"
                       data-on-text="@lang('common.is_active')" data-off-text="@lang('common.is_active')" data-handle-width="100"
                       class="form-control @error('is_active') is-invalid @enderror"
                    @checked(old('is_active', isset($article) && $article->is_active ?? $article->is_active)) >
            </div>

            <div class=" col-sm-4">
                <input type="checkbox" name="in_order" data-toggle="switch"
                       data-onstyle="outline-success" data-offstyle="outline-secondary"
                       data-on-text="@lang('common.in_order')" data-off-text="@lang('common.in_order')" data-handle-width="100"
                       class="@error('in_order') is-invalid @enderror"
                    @checked(old('in_order', isset($article) && $article->in_order ?? $article->in_order)) >
            </div>

        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>
