<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipodocumentoRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true; // Cambiar según sea necesario
    }

    public function rules(): array
    {
        if ($this->isMethod('post')) {
            return [
                'nombre' => 'required|unique:tipodocumentos,nombre|regex:/^[\pL\s\-]+$/u',
                'abreviatura' => 'required|unique:tipodocumentos,abreviatura',
            ];    
        } elseif ($this->isMethod('put')) {
            return [
                'nombre' => 'required|regex:/^[\pL\s\-]+$/u|unique:tipodocumentos,nombre,' . $this->route('tipodocumentos'),
                'abreviatura' => 'required|regex:/^[\pL\s\-]+$/u|unique:tipodocumentos,abreviatura,' . $this->route('tipodocumentos'),
            ];
        }

        return []; // Retornar un array vacío si no es ni post ni put
    }
}
