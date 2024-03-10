<?php

namespace App\Models;

class Categoria extends Base
{
    protected const TABLA = 'categoria';

    public function estaSiendoUsado(int $categoriaId): bool
    {
        // Si tiene al menos un gasto
        /** @var Gasto $modeloGasto */
        $modeloGasto = app(Gasto::class);

        return !empty ($modeloGasto->buscarPorCategoria($categoriaId));
    }
}
