<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Gasto extends Base
{
    protected const TABLA = 'gasto';

    public function buscarPorCategoria(int $categoriaId): ?array
    {
        return DB::table(self::TABLA)
            ->where('categoria_id', '=', $categoriaId)
            ->get()
            ->toArray();
    }
}
