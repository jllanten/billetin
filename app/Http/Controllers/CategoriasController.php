<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CategoriasController extends BaseController
{
    public function __construct(private Categoria $modeloCategoria)
    {
    }

	public function listado()
	{
        $categorias = $this->modeloCategoria->listado();

        if (request()->ajax()) {
            return response()->json($categorias);
        }

        return view('categoria.listado', compact('categorias'));
	}

    public function agregar(Request $request)
    {
        $nombre = $request->get('nombre');

        $busqueda = $this->modeloCategoria->busqueda($nombre);
        if (!empty($busqueda)) {
            return respuestaError('CategoriaYaExiste');
        }

        $id = $this->modeloCategoria->insertar($nombre);

        return respuestaOk(['id' => $id]);
    }
}
