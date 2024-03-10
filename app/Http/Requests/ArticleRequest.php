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
            'ean_code' => ['required', 'string', Rule::unique('articles','ean_code')],
            'product_code' => ['required', 'string', Rule::unique('articles','product_code')],
            'description' => 'required|string',
            'is_active'=> 'required|boolean',
            'in_order'=> 'required|boolean',
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

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'in_order' => (bool) $this->is_sterilized,
            'is_active' => (bool) $this->is_active,
        ]);
    }

}
