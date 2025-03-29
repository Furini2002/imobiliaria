<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCityRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:100',
            'state' => 'sometimes|required|string|max:2',
        ];
    }

    /**
     * Mensagens personalizadas para os erros de validação.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'O nome da cidade é obrigatório.',
            'name.string' => 'O nome da cidade deve ser um texto.',
            'name.max' => 'O nome da cidade deve ter no máximo :max caracteres.',
            'state.required' => 'O estado é obrigatório.',
            'state.string' => 'O estado deve ser um texto.',
            'state.max' => 'O estado deve ter no máximo :max caracteres (ex: PR, SP).',
        ];
    }

    /**
     * Nomes amigáveis para os atributos.
     */
    public function attributes(): array
    {
        return [
            'name' => 'nome da cidade',
            'state' => 'estado (UF)',
        ];
    }
}
