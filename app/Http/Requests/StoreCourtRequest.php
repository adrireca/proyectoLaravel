<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCourtRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'luz' => ['required', 'boolean'],
            'disponible' => ['required', 'boolean'],
            'cubierta' => ['required', 'boolean'],
            'precioLuz' => 'required|decimal:0,2',
            'precioPista' => 'required|decimal:0,2',
            'tipoPista' => Rule::in(['tenis', 'padel', 'futbol', 'futbolSala']),
        ];
    }
}
