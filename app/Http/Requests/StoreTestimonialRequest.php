<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTestimonialRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'text' => 'required|string|max:1000',
            'photo' => 'required|string|max:255',
            'status' => 'required|string|max:50'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O nome é obrigatório.',
            'name.string' => 'O nome deve ser um texto.',
            'name.max' => 'O nome deve ter no máximo :max caracteres.',

            'city_id.required' => 'A cidade é obrigatória.',
            'city_id.exists' => 'A cidade selecionada não é válida.',

            'text.required' => 'O texto do depoimento é obrigatório.',
            'text.string' => 'O texto do depoimento deve ser um texto.',
            'text.max' => 'O texto do depoimento deve ter no máximo :max caracteres.',

            'photo.required' => 'A foto é obrigatória.',
            'photo.string' => 'A foto deve ser uma URL ou caminho válido.',
            'photo.max' => 'A foto deve ter no máximo :max caracteres.',

            'status.required' => 'O status é obrigatório.',
            'status.string' => 'O status deve ser um texto.',
            'status.max' => 'O status deve ter no máximo :max caracteres.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nome',
            'city_id' => 'cidade',
            'text' => 'texto do depoimento',
            'photo' => 'foto',
            'status' => 'status',
        ];
    }
}
