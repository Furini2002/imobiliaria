<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'address' => 'required|string|max:255',
            'features' => 'nullable|string|max:1000',
            'price' => 'required|numeric',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'land_area' => 'required|numeric',
            'built_area' => 'required|numeric',
            'city_id' => 'required|exists:cities,id',
            'status_id' => 'required|exists:statuses,id',
            'type_id' => 'required|exists:property_types,id'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'O título é obrigatório.',
            'title.string' => 'O título deve ser um texto.',
            'title.max' => 'O título deve ter no máximo :max caracteres.',

            'description.string' => 'A descrição deve ser um texto.',
            'description.max' => 'A descrição deve ter no máximo :max caracteres.',

            'address.required' => 'O endereço é obrigatório.',
            'address.string' => 'O endereço deve ser um texto.',
            'address.max' => 'O endereço deve ter no máximo :max caracteres.',

            'features.string' => 'As características devem ser um texto.',
            'features.max' => 'As características devem ter no máximo :max caracteres.',

            'price.required' => 'O preço é obrigatório.',
            'price.numeric' => 'O preço deve ser um número.',

            'bedrooms.required' => 'O número de quartos é obrigatório.',
            'bedrooms.integer' => 'O número de quartos deve ser um número inteiro.',

            'bathrooms.required' => 'O número de banheiros é obrigatório.',
            'bathrooms.integer' => 'O número de banheiros deve ser um número inteiro.',

            'land_area.required' => 'A área do terreno é obrigatória.',
            'land_area.numeric' => 'A área do terreno deve ser um número.',

            'built_area.required' => 'A área construída é obrigatória.',
            'built_area.numeric' => 'A área construída deve ser um número.',

            'city_id.required' => 'A cidade é obrigatória.',
            'city_id.exists' => 'A cidade selecionada é inválida.',

            'status_id.required' => 'O status é obrigatório.',
            'status_id.exists' => 'O status selecionado é inválido.',

            'type_id.required' => 'O tipo de imóvel é obrigatório.',
            'type_id.exists' => 'O tipo de imóvel selecionado é inválido.',
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'título',
            'description' => 'descrição',
            'address' => 'endereço',
            'features' => 'características',
            'price' => 'preço',
            'bedrooms' => 'quartos',
            'bathrooms' => 'banheiros',
            'land_area' => 'área do terreno',
            'built_area' => 'área construída',
            'city_id' => 'cidade',
            'status_id' => 'status',
            'type_id' => 'tipo do imóvel',
        ];
    }
}
