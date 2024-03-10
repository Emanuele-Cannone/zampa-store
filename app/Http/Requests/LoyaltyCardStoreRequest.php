<?php

namespace App\Http\Requests;

use App\Models\LoyaltyCard;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class LoyaltyCardStoreRequest extends FormRequest
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
            'number' => ['required','numeric',Rule::unique(LoyaltyCard::class)->ignore($this->request->get('number'),'number')]
        ];
    }

    /**
     * Prepare the data for validation.
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'number' => (int)$this->get('customer_id').Str::replace('-','',date('Y-m-d')),
        ]);
    }
}
