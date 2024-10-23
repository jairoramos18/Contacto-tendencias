<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudads';

    protected $fillable = [
        'nombre',
        'estado',           // Agrega el estado si planeas usarlo
        'registradopor',    // Agrega el registradopor si planeas usarlo
        'departamento_id',  // Asegúrate de incluir el departamento_id para la relación
    ];

    protected $guarded = [
        'estado','registradopor',
    ];


    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

    public function departamento()
    {
        return $this->belongsTo('App\Models\Departamento');
    }

    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'ciudad_id');
    }
}
