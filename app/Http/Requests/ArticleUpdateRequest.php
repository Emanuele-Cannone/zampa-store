<?php

namespace App\Http\Requests;

use App\Models\Article;
use App\Models\Cluster;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ean_code' => ['required',Rule::unique(Article::class, 'name')->ignore($this->id)],
            'customer_code' => ['required',Rule::unique(Article::class, 'name')->ignore($this->id)],
            'description' => 'required',
            'is_active'=>'required',
            'is_order'=>'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'required' => '":attribute" ' . __('common.validation_required'),
            'unique' => '":attribute" ' . __('common.validation_unique'),
        ];
    }

}
