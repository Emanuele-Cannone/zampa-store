<?php

namespace App\Http\Requests;

use App\Models\Breed;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BreedUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', Rule::unique(Breed::class)->ignore($this->request->get('name'), 'name')],
            'animal_typology_id' => ['required', 'exists:animal_typologies,id']
        ];
    }
}
