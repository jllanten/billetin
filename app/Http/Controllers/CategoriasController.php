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

    public function ver(Request $request)
    {
        $categoria = $this->modeloCategoria->busquedaPorId((int)$request->route()->parameter('id'));

        if (empty($categoria)) {
            return respuestaError('CategoriaNoExiste');
        }

        return respuestaOk(['nombre' => $categoria['nombre']]);
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

        $busqueda = $this->modeloCategoria->busquedaPorNombre($nombre);
        if (!empty($busqueda)) {
            return respuestaError('CategoriaYaExiste');
        }

        $id = $this->modeloCategoria->insertar(['nombre' => $nombre]);

        return respuestaOk(['id' => $id]);
    }

    public function editar(Request $request)
    {
        $this->modeloCategoria->editar(
            (int)$request->get('id'),
            ['nombre' => $request->get('nombre')]
        );

        return respuestaOk();
    }

    public function borrar(Request $request)
    {
        $categoriaId = (int)$request->get('id');
        if ($this->modeloCategoria->estaSiendoUsado($categoriaId)) {
            return respuestaError('CategoriaNoExiste');
        }

        $this->modeloCategoria->borrar($categoriaId);

        return respuestaOk();
    }
}
