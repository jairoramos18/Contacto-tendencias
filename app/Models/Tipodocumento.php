<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tipodocumento extends Model
{
    use HasFactory;

    protected $table = 'tipodocumentos';
    
    protected $fillable = [
        'nombre', 'estado', 'registradopor', 'abreviatura',
    ];
    
    protected $guarded = [
        'estado', 'registradopor',
    ];

    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'tipodocumento_id');
    }
}
