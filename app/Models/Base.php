<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Base
{
    protected const TABLA = '';

    public function busquedaPorNombre(string $nombre): array
    {
        $busqueda = DB::table(static::TABLA)
            ->where('nombre', '=', strtolower($nombre))
            ->get()
            ->toArray();

        return $busqueda ?? [];
    }

    public function busquedaPorId(int $id): array
    {
        $busqueda = DB::table(static::TABLA)
            ->where(static::TABLA . '_id', '=', $id)
            ->first();
        $busqueda = (array) $busqueda;

        return empty($busqueda) ? [] : $busqueda;
    }

    public function listado(): array
    {
        return DB::table(static::TABLA)
            ->get()
            ->toArray();
    }

    public function insertar(array $data): int
    {
        DB::table(static::TABLA)
            ->insert($data);

        return DB::getPdo()->lastInsertId();
    }

    public function editar(int $id, array $data): void
    {
        DB::table(static::TABLA)
            ->where(static::TABLA . '_id', '=', $id)
            ->update($data);
    }

    public function borrar(int $id): void
    {
        DB::table(static::TABLA)
            ->where(static::TABLA . '_id', '=', $id)
            ->delete();
    }
}
