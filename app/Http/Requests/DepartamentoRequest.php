<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar según sea necesario
    }

    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'pais_id' => 'required|exists:paises,id', // Asegúrate de que pais_id exista
                'nombre' => 'required|unique:departamentos,nombre|regex:/^[\pL\s\-]+$/u',
            ];    
        } elseif ($this->isMethod('put')) {
            return [
                'pais_id' => 'required|exists:paises,id', // Si es necesario, asegúrate de incluirlo
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u|unique:departamentos,nombre,' . $this->route('departamentos'),
            ];
        }

        return []; // Retornar un array vacío si no es ni post ni put
    }
    
    public function attributes(): array
    {
        return [
            'pais_id' => 'país', // Personalizar el nombre del atributo
        ];
    }
}
