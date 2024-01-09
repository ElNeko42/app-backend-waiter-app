<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['tipo_producto_id', 'nombre', 'precio_interior', 'precio_terraza', 'imagen'];

    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class);
    }
}
