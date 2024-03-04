<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AnimalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'name' => 'string',
            'breed_id' => 'required|exists:breeds,id',
            'is_sterilized' => 'required|boolean',
            'birth' => 'date|date_format:Y-m-d|before:tomorrow',
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
        ];
    }

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_sterilized' => (bool) $this->is_sterilized,
            'birth' => Carbon::createFromFormat('d-m-Y', $this->birth)->format('Y-m-d')
        ]);
    }
}
