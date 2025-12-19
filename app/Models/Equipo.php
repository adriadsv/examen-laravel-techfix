<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = [
    'tipo_equipo',
    'marca_modelo',
    'problema_reportado',
    'nombre_cliente',
    'telefono',
    'estado',
];
}
