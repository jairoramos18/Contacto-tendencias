<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiudadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cambiar si se necesita lógica de autorización
    }

    public function rules(): array
    {
        // Reglas de validación para las solicitudes POST
        if ($this->isMethod('post')) {
            return [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
                'departamento_id' => 'required|exists:departamentos,id', // Verificar que exista en la tabla departamentos
            ];
        } 
        
        // Reglas de validación para las solicitudes PUT
        elseif ($this->isMethod('put')) {
            return [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u',
                // Puedes incluir departamento_id aquí si es necesario
            ];
        }

        // Si no es POST ni PUT, retornar un array vacío o reglas por defecto
        return [];
    }
    
    public function attributes(): array
    {
        return [
            'departamento_id' => 'departamento', // Personalizar el nombre del atributo
        ];
    }
}
