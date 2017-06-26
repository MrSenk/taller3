<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ejemplar extends Model
{
    // Definir tabla a usar
    protected $table = 'ejemplares';
    // Clave primaria
    protected $primaryKey = 'id';
    // Kill create y deleteAt
    public $timestamps = false;
    // Definir columnas editables
    protected $fillable = [
    	'fecha_prestamo',
    	'fecha_devolucion',
    	'libro_id',
    	'estado_id',
    	'usuario_id',
    ];
}
