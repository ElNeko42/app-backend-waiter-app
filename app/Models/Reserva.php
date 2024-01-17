<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = ['cliente', 'fecha_reserva', 'hora_reserva', 'personas', 'observaciones', 'estado', 'mesa_id'];

}
