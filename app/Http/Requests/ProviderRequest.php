<?php

namespace App\Http\Requests;

use App\Models\Provider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProviderRequest extends FormRequest
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
     * @param Provider $provider
     * @return array
     */
    public function rules(Provider $provider): array
    {
        return [
            'company_name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'city' => ['required', 'string'],
            'postal_code' => ['required', 'string'],
            'country' => ['required', 'string'],
            'fiscal_code' => ['required', 'string'],
            'p_iva' => ['required', 'string', Rule::unique('providers', 'p_iva')->ignore($this->provider->id)],
            'iban' => ['nullable', 'string'],
            'email' => ['required', 'email'],
            'pec' => ['nullable', 'email'],
            'telephone' => ['nullable', 'string'],
            'other_contact' => ['nullable', 'string'],
        ];
    }
}
