<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $fillable = ['numero_mesa', 'tipo', 'asientos', 'disponible', 'cuenta_total', 'camarero_id'];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }

    // Relación con reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Relación con camareros
    public function camarero()
    {
        return $this->belongsTo(Camarero::class);
    }

}
