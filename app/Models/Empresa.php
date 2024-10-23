<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'nombre', 'logo', 'direccion', 'telefono', 'celular', 'correo', 'link_pagina', 'link_ubicacion', 'estado', 'registrado_por'
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class, 'ciudad_id');
    }

    public function usuarioRegistrador()
    {
        return $this->belongsTo(User::class, 'registrado_por');
    }
}
