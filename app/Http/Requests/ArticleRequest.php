<?php

namespace App\Http\Requests;
use App\Models\Article;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleRequest extends FormRequest
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
            'ean_code' => ['required', 'string', Rule::unique(Article::class, 'ean_code')],
            'product_code' => ['required', 'string', Rule::unique(Article::class, 'product_code')],
            'description' => 'required',
            'is_active'=>'required',
            'in_order'=>'required',
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
