<?php

use Illuminate\Http\JsonResponse;

function respuestaOk(array $payload = [], int $codigo = 0): JsonResponse
{
    $payload['estado'] = 'ok';
    $payload['codigo'] = $codigo;

    return response()->json($payload);
}

function respuestaError(string $codigo, array $payload = []): JsonResponse
{
    $payload['estado'] = 'error';
    $payload['codigo'] = $codigo;
    $payload['mensaje'] = error($codigo, $payload);

    return response()->json($payload);
}

function error(string $codigo, array $payload = []): string
{
    $error = config('errores.' . $codigo);
    if (is_null($error)) {
        $error = config('errores.generico');
    }

    // TODO falta interpretar cuando hay sprintf leyendo de $payload

    return $error['mensaje'];
}

