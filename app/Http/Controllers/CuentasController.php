<?php

namespace App\Http\Controllers;

use Illuminate\Database\Connection;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class CuentasController extends BaseController
{
    private Connection $dbLector;
    private Connection $dbEscritor;
    public function __construct()
    {
        $this->dbLector = DB::connection('mysql.lector');
        $this->dbEscritor = DB::connection('mysql.escritor');
    }

	public function listado()
	{
        $cuentas = $this->dbLector->table('cuenta')
            ->get();

        return view('cuenta.listado', compact('cuentas'));
	}

}
