<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    protected $table = 'tipo_producto';

    // Relación con Productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
