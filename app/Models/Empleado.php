<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;


    protected $fillable = [
        'nombre_apellido',
        'dni',
        'email',
        'telefono',
        'direccion',
        'rol',
        'estado',
        'hora_entrada',
        'hora_salida',
        'fecha_nacimiento'
    ];
}
