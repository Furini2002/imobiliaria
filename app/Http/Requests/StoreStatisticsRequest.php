<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStatisticsRequest extends FormRequest
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
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s|after_or_equal:start_time',
            'origin' => 'required|string|max:255',
            'device' => 'required|string|max:100',
            'date' => 'required|date'
        ];
    }

    public function messages(): array
    {
        return [
            'start_time.required' => 'O horário de início é obrigatório.',
            'start_time.date_format' => 'O horário de início deve estar no formato HH:MM:SS.',

            'end_time.required' => 'O horário de término é obrigatório.',
            'end_time.date_format' => 'O horário de término deve estar no formato HH:MM:SS.',
            'end_time.after_or_equal' => 'O horário de término deve ser igual ou posterior ao horário de início.',

            'origin.required' => 'A origem é obrigatória.',
            'origin.string' => 'A origem deve ser um texto.',
            'origin.max' => 'A origem deve ter no máximo :max caracteres.',

            'device.required' => 'O dispositivo é obrigatório.',
            'device.string' => 'O dispositivo deve ser um texto.',
            'device.max' => 'O dispositivo deve ter no máximo :max caracteres.',

            'date.required' => 'A data é obrigatória.',
            'date.date' => 'A data deve ser válida.'
        ];
    }

    public function attributes(): array
    {
        return [
            'start_time' => 'horário de início',
            'end_time' => 'horário de término',
            'origin' => 'origem',
            'device' => 'dispositivo',
            'date' => 'data',
        ];
    }
}
