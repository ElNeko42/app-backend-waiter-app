<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoProducto;

class TipoProductoController extends Controller
{
    
    public function index()
    {
        $tipos = TipoProducto::all();
        return response()->json($tipos);
    }
}
