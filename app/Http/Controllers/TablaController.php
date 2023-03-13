<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TablaController extends Controller
{
    public function index()
    {
        $datos = [
            ['id' => 1, 'nombre' => 'Juan', 'abonado' => 100],
            ['id' => 2, 'nombre' => 'Pedro', 'abonado' => 200],
            ['id' => 3, 'nombre' => 'María', 'abonado' => 300],
        ];
        return view('tabla', compact('datos'));
    }

    public function guardar(Request $request)
    {
        $datos = $request->input('datos');
        // Aquí podríamos guardar los datos en la base de datos, pero en este caso solo los imprimimos
        print_r($datos);
        return redirect()->route('tabla.index');
    }

    public function borrar(Request $request)
    {
        $id = $request->input('id');
        $datos = $request->input('datos');
        // Borramos la fila con el id recibido
        unset($datos[$id]);
        // Reindexamos el array
        $datos = array_values($datos);
        return view('tabla', compact('datos'));
    }

    public function agregar(Request $request)
    {
        $datos = $request->input('datos');
        $datos[] = ['id' => count($datos) + 1, 'nombre' => '', 'abonado' => ''];
        return view('tabla', compact('datos'));
    }

    public function abonar(Request $request)
    {
        $id = $request->input('id');
        $numero = $request->input('numero');  
       
        // Sumamos el número recibido al campo abonado de cada fila
        foreach ($id as &$fila) {
            $fila['abonado'] += $numero;
        }
        return view('tabla', compact('datos'));
    }
}
