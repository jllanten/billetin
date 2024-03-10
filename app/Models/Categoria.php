<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Categoria
{
    private const TABLA = 'categoria';

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
            ->where('categoria_id', '=', $id)
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
            ->where('categoria_id', '=', $id)
            ->update(['nombre' => $nombre]);
    }

    public function estaSiendoUsado(int $categoriaId): bool
    {
        // Si tiene al menos un gasto
        /** @var Gasto $modeloGasto */
        $modeloGasto = app(Gasto::class);

        return !empty ($modeloGasto->buscarPorCategoria($categoriaId));
    }

    public function borrar(int $id): void
    {
        DB::table(self::TABLA)
            ->where('categoria_id', '=', $id)
            ->delete();
    }
}
