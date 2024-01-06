<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mesa;

class MesasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $mesas = Mesa::all();
        return response()->json($mesas);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_de_mesa' => 'required',
            'numero_de_asientos' => 'required|integer',
            'numero_de_mesa' => 'required|string',
        ]);

        $mesa = new Mesa();
        $mesa->tipo = $request->tipo_de_mesa;
        $mesa->asientos = $request->numero_de_asientos;
        $mesa->numero_mesa = $request->numero_de_mesa;
        $mesa->save();

        return response()->json(['message' => 'Mesa creada con éxito', 'data' => $mesa], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
