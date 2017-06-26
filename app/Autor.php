<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    // Definir tabla a usar
    protected $table = 'autores';
    // Clave primaria
    protected $primaryKey = 'id';
    // Kill create y deleteAt
    public $timestamps = false;
    // Definir columnas editables
    protected $fillable = [
    	'nombre',
    	'apellido',
    ];
}
