<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\EjemplarRequest;

// Uso de modelos
use App\Ejemplar;
use App\Libro;
use App\Estado;
use App\Usuario;
use App\Autor;
use App\Genero;

use Redirect;
use Session;

class EjemplarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // :^(
        $ejemplares = Ejemplar::all();
        $datos = array ();
        $contador = 0;

        // Recorrido de objetos
        foreach ($ejemplares as $ejemplar) {
            $libro = Libro::find($ejemplar->libro_id); // Buscamos libro
            $estado = Estado::find($ejemplar->estado_id); // Buscar estado
            $usuario = Usuario::find($ejemplar->usuario_id); // -_-
            $autor = Autor::find($libro->autor_id);
            $genero = Genero::find($libro->genero_id);


            // Asignación datos

            $datos[$contador]["id"] = $ejemplar->id;
            $datos[$contador]["libro"]["id"] = $libro->id;
            $datos[$contador]["libro"]["titulo"] = $libro->titulo;
            $datos[$contador]["libro"]["anno"] = $libro->anno;
            $datos[$contador]["libro"]["autor"] = $autor;
            $datos[$contador]["libro"]["genero"] = $genero;
            $datos[$contador]["estado"] = $estado;
            $datos[$contador]["usuario"] = $usuario;
            $datos[$contador]["fecha_prestamo"] = $ejemplar->fecha_prestamo;
            $datos[$contador]["fecha_devolucion"] = $ejemplar->fecha_devolucion;

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
     * 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * Request Personalizado
     */
    public function store(EjemplarRequest $request)
    {
        $ejemplar = Ejemplar::create($request->all());
        if (!isset($ejemplar)) {
            $datos = [
            'errors' => true,
            'msg' => 'No se creo el ejemplar',
            ];
            $ejemplar = \Response::json($datos, 404);
        }

        // Se retorna a la ruta
        return $ejemplar;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ejemplar = Ejemplar::find($id);
        $datos = array ();

        if (!isset($ejemplar)) {
            $respuesta = [
            'errors' => true,
            'msg' => 'No se encontró el ejemplar',
            ];
            $ejemplar = \Response::json($respuesta, 404);
            return $ejemplar;
        } else {
            $libro = Libro::find($ejemplar->libro_id); // Buscamos libro
            $estado = Estado::find($ejemplar->estado_id); // Buscar estado
            $usuario = Usuario::find($ejemplar->usuario_id); // -_-
            $autor = Autor::find($libro->autor_id);
            $genero = Genero::find($libro->genero_id);


            // Asignación datos

            $datos["id"] = $ejemplar->id;
            $datos["libro"]["id"] = $libro->id;
            $datos["libro"]["titulo"] = $libro->titulo;
            $datos["libro"]["anno"] = $libro->anno;
            $datos["libro"]["autor"] = $autor;
            $datos["libro"]["genero"] = $genero;
            $datos["estado"] = $estado;
            $datos["usuario"] = $usuario;
            $datos["fecha_prestamo"] = $ejemplar->fecha_prestamo;
            $datos["fecha_devolucion"] = $ejemplar->fecha_devolucion;

            return $datos;
        }
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
        $ejemplar = Ejemplar::find($id);
        $ejemplar->fill($request->all());
        $ejemplarRetorno = $ejemplar->save();

        // Se guardan los cambios

        if (isset($ejemplar)) {
            $ejemplar = \Response::json($ejemplarRetorno, 200);
        } else {
            $ejemplar = \Response::json(['error' => 'No se ha podido actualizar ejemplar'], 404);
        }

        return $ejemplar;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ejemplar = Ejemplar::find($id);

        if ($ejemplar->delete()) {
            $ejemplar = \Response::json(['delete' => true, 'id' => $id], 200);
        } else {
            $ejemplar = \Response::jsoon(['error' => 'No se ha podido eliminar ejemplar'], 403);
        }

        return $ejemplar;
    }
}
