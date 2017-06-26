<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    // Definir tabla a usar
    protected $table = 'libros';
    // Clave primaria
    protected $primaryKey = 'id';
    // Kill create y deleteAt
    public $timestamps = false;
    // Definir columnas editables
    protected $fillable = [
    	'titulo',
    	'anno',
    	'autor_id',
    	'genero_id',
    ];
}
