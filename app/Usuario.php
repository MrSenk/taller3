<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    // Definir tabla a usar
    protected $table = 'usuarios';
    // Clave primaria
    protected $primaryKey = 'id';
    // Kill create y deleteAt
    public $timestamps = false;
    // Definir columnas editables
    protected $fillable = [
    	'rut',
    	'nombre',
    	'apellido',
    	'telefono',
    ];
}
