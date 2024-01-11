<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transporte_Repartidor extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'repartidor';
    protected $primaryKey='idRepartidor';
    public $timestamps=false;
    protected $fillable = [
        'dni',
        'nombres',
        'direccion',
        'email',
        'telefono',
        'sueldo',
        'vehiculo',
        'placa'
    ];

    public function pedido()
    {
        return $this->hasMany(Transporte_Pedido::class,'idRepartidor','idRepartidor');
    }
    // public function vehiculo()
    // {
    //     return $this->hasMany(Transporte_Vehiculo::class,'idRepartidor','idRepartidor');
    // }
}
