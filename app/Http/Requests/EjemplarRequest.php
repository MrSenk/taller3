<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EjemplarRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        // Reglas para Request entrante
        return [
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required',
            'libro_id' => 'required|numeric',
            'estado_id' => 'required|numeric',
            'usuario_id' => 'required|numeric'
        ];
    }
}
