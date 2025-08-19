<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterPropertyRequest extends FormRequest
{
    public function authorize()
    {
        return true; // ajuste se precisar de autenticação
    }

    public function rules()
    {
        return [
            'status'      => ['nullable','integer','exists:statuses,id'],
            'city'        => ['nullable','integer','exists:cities,id'],
            'type'        => ['nullable','integer','exists:property_types,id'],
            'neighborhood'=> ['nullable','integer','exists:neighborhoods,id'],

            'maxPrice'    => ['nullable','numeric','min:0'],
            'bathrooms'   => ['nullable','integer','min:0'],
            'bedrooms'    => ['nullable','integer','min:0'],
            'suites'      => ['nullable','integer','min:0'],
        ];
    }
}
