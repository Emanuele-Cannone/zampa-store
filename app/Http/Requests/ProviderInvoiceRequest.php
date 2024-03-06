<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class ProviderInvoiceRequest extends FormRequest
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
            'amount' => 'required|numeric',
            'date' => 'required|date|date_format:Y-m-d',
            'provider_id' => 'required|exists:providers,id',
            'number' => 'required|string',
            'paid' => 'required|boolean'
        ];
    }


    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'paid' => (bool) $this->paid,
            'date' => Carbon::createFromFormat('d-m-Y', $this->date)->format('Y-m-d')
        ]);
    }
}
