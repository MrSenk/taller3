<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    // Definir tabla a usar
    protected $table = 'generos';
    // Clave primaria
    protected $primaryKey = 'id';
    // Kill create y deleteAt
    public $timestamps = false;
    // Definir columnas editables
    protected $fillable = [
    	'descripcion',
    ];
}
