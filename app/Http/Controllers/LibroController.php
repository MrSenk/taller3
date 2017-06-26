<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libro;
use App\Autor;
use App\Genero;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Jejejeje Piter me dejaste sin finde jejejeje
        $libros = Libro::all();
        $datos = array ();
        $contador = 0;

        // Recorrido
        foreach ($libros as $libro) {
            $autor = Autor::find($libro->autor_id);
            $genero = Genero::find($libro->genero_id);

            // Asignación de valores

            $datos[$contador]["id"] = $libro->id;
            $datos[$contador]["titulo"] = $libro->titulo;
            $datos[$contador]["anno"] = $libro->anno;
            $datos[$contador]["autor"] = $autor;
            $datos[$contador]["genero"] = $genero;

            $contador++;
        }

        return $datos;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
