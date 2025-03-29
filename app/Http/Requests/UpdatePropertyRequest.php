<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string|max:2000',
            'address' => 'sometimes|required|string|max:255',
            'features' => 'sometimes|nullable|string|max:1000',
            'price' => 'sometimes|required|numeric',
            'bedrooms' => 'sometimes|required|integer',
            'bathrooms' => 'sometimes|required|integer',
            'land_area' => 'sometimes|required|numeric',
            'built_area' => 'sometimes|required|numeric',
            'city_id' => 'sometimes|required|exists:cities,id',
            'status_id' => 'sometimes|required|exists:statuses,id',
            'type_id' => 'sometimes|required|exists:property_types,id'
        ];
    }
}
