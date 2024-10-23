<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Cambiar a 'true' para permitir que todos los usuarios puedan realizar esta solicitud.
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
            'nombre' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'direccion' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'celular' => 'nullable|string|max:15',
            'correo' => 'required|email|max:255',
            'link_pagina' => 'nullable|url|max:255',
            'link_ubicacion' => 'nullable|url|max:255',
            'ciudad_id' => 'required|exists:ciudads,id',
            'estado' => 'nullable|boolean', // Validación para el estado
            'registrado_por' => 'nullable|exists:users,id', // Validación opcional para registrado_por
        ];
    }
}
