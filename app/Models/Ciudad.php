<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    protected $table = 'ciudads';

    protected $fillable = [
        'nombre'
    ];

    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }
}
