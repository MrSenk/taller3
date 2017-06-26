<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    // Definir tabla a usar
    protected $table = 'estados';
    // Clave primaria
    protected $primaryKey = 'id';
    // Kill create y deleteAt
    public $timestamps = false;
    // Definir columnas editables
    protected $fillable = [
    	'descripcion',
    ];
}
