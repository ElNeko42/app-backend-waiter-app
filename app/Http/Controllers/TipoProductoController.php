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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|unique:tipo_producto|max:255',
        ]);
        $tipoProducto = TipoProducto::create([
            'nombre' => $validatedData['nombre'],
        ]);

        // Responder con el tipo de producto creado
        return response()->json($tipoProducto, 201);
    }
}
