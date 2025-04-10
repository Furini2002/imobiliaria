<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyImageRequest extends FormRequest
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
            'image_path' => 'sometimes|required|string|max:255',
            'property_id' => 'sometimes|required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'image_path.required' => 'O caminho da imagem é obrigatório.',
            'image_path.string' => 'O caminho da imagem deve ser um texto.',
            'image_path.max' => 'O caminho da imagem deve ter no máximo :max caracteres.',

            'property_id.required' => 'O ID do imóvel é obrigatório.',
            'property_id.integer' => 'O ID do imóvel deve ser um número inteiro.',
        ];
    }

    public function attributes(): array
    {
        return [
            'image_path' => 'caminho da imagem',
            'property_id' => 'ID do imóvel',
        ];
    }
}
