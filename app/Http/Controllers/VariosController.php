<?php

namespace App\Http\Controllers;

use Illuminate\Database\Connection;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class VariosController extends BaseController
{
	public function obtenerCsrf()
	{
        return view();
	}

}
