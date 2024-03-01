<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Categoria
{
    private const TABLA = 'categoria';

    public function busqueda(string $nombre): array
    {
        $busqueda = DB::table(self::TABLA)
            ->where('nombre', '=', strtolower($nombre))
            ->get()
            ->toArray();

        return $busqueda ?? [];
    }

    public function listado(): array
    {
        return DB::table(self::TABLA)->get()->toArray();
    }

    public function insertar(string $nombre): int
    {
        DB::table(self::TABLA)
            ->insert(['nombre' => $nombre]);

        return DB::getPdo()->lastInsertId();
    }
}
