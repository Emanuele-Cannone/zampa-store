<div class="card">
    <div class="card-body">
        <div class="form-row">
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="ean_code">@lang('article.ean_code') *</label>
                    <input type="text" id="ean_code" name="ean_code" value="{{ isset($article) ? $article->ean_code : old('ean_code') }}"
                           class="form-control @error('ean_code') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" required >
                    <small class="text-danger">@error('ean_code') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="product_code">@lang('common.product_code') *</label>
                    <input type="text" id="product_code" name="product_code" value="{{ isset($article) ? $article->product_code : old('product_code') }}"
                           class="form-control @error('product_code') is-invalid @enderror"
                           required >
                    <small class="text-danger">@error('product_code') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="description">@lang('common.description')*</label>
                    <input type="text" id="description" name="description" value="{{ isset($article) ? $article->description : old('description') }}"
                           class="form-control @error('description') is-invalid @enderror"
                           placeholder="@lang('common.enter_value')" >
                    <small class="text-danger">@error('description') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="is_active">@lang('common.is_active')*</label>
                    <select id="is_active"  class="form-control @error('is_active') is-invalid @enderror"
                            name="is_active">
                        <option value="">@lang('common.enter_value')</option>
                        <option value="1" {{ old('is_active',isset($article) ? $article->is_active : false) == true ?'selected' : '' }}>Sì</option>
                        <option value="0" {{ old('is_active',isset($article) ? $article->is_active : false) == true ?'selected' : '' }}>No</option>
                    </select>
                    <small class="text-danger">@error('is_active') {{ $message }}@enderror</small>
                </div>
            </div>
            <div class="form-group col-sm-4">
                <div class="form-group">
                    <label for="in_order">@lang('common.in_order')</label>
                    <select id="in_order"  class="form-control @error('in_order') is-invalid @enderror"
                            name="in_order">
                        <option value="">@lang('common.enter_value')</option>
                        <option value="1" {{ old('in_order',isset($article) ? $article->in_order : false) == true ?'selected' : '' }}>Sì</option>
                        <option value="1" {{ old('in_order',isset($article) ? $article->in_order : false) == true ?'selected' : '' }}>No</option>
                    </select>
                    <small class="text-danger">@error('in_order') {{ $message }}@enderror</small>
                </div>
            </div>
        </div>
    </div>
</div>
<p>* @lang('common.required_fields')</p>
