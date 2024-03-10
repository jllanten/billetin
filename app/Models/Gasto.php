<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Gasto
{
    private const TABLA = 'gasto';

    public function busquedaPorNombre(string $nombre): array
    {
        $busqueda = DB::table(self::TABLA)
            ->where('nombre', '=', strtolower($nombre))
            ->get()
            ->toArray();

        return $busqueda ?? [];
    }

    public function busquedaPorId(int $id): array
    {
        $busqueda = DB::table(self::TABLA)
            ->where('gasto_id', '=', $id)
            ->first();
        $busqueda = (array) $busqueda;

        return empty($busqueda) ? [] : $busqueda;
    }

    public function listado(): array
    {
        return DB::table(self::TABLA)
            ->get()
            ->toArray();
    }

    public function insertar(string $nombre): int
    {
        DB::table(self::TABLA)
            ->insert(['nombre' => $nombre]);

        return DB::getPdo()->lastInsertId();
    }

    public function editar(int $id, string $nombre): void
    {
        DB::table(self::TABLA)
            ->where('gasto_id', '=', $id)
            ->update(['nombre' => $nombre]);
    }

    public function buscarPorCategoria(int $categoriaId): ?array
    {
        return DB::table(self::TABLA)
            ->where('categoria_id', '=', $categoriaId)
            ->get()
            ->toArray();
    }
}
