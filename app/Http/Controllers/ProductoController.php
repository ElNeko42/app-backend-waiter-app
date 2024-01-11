<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('tipoProducto')->get();

        return response()->json($productos);
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
        // Validación
        $validatedData = $request->validate([
            'tipo_producto_id' => 'required|exists:tipo_producto,id',
            'nombre' => 'required|max:255',
            'precio_interior' => 'required|numeric',
            'precio_terraza' => 'required|numeric',

        ]);

        // Procesamiento y almacenamiento de la imagen
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes', 'public');
        }

        // Crear el producto
        $producto = Producto::create([
            'tipo_producto_id' => $validatedData['tipo_producto_id'],
            'nombre' => $validatedData['nombre'],
            'precio_interior' => $validatedData['precio_interior'],
            'precio_terraza' => $validatedData['precio_terraza'],
            'imagen' => $imagenPath ?? null,
        ]);

        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $producto = Producto::find($id);

        if (is_null($producto)) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
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


        $producto = Producto::find($id);

        if (is_null($producto)) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Si quieres manejar la carga de archivos, asegúrate de validar y almacenar el archivo correctamente.
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('imagenes_productos', 'public');
            // Eliminar la imagen antigua si es necesario
            // Storage::delete('public/' . $producto->imagen);
            $validatedData['imagen'] = $imagenPath;
        }
        $producto->tipo_producto_id = $request->tipo_producto;
        $producto->update($request->all());

        return response()->json($producto);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
