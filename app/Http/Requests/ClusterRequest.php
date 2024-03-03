<?php

namespace App\Http\Requests;

use App\Models\Cluster;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ClusterRequest extends FormRequest
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
     * @param Cluster $cluster
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(Cluster $cluster): array
    {
        return [
            'name' => ['required', 'string', Rule::unique('clusters', 'name')->ignore($this->cluster->id)]
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