<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte_Delivery extends Model
{
    use HasFactory;
    protected $table = 'delivery';
    protected $primaryKey='idDelivery';
    public $timestamps=false;
    protected $fillable = [
        'observaciones',
        'direccion',
        'medioPago'
    ];

    public function repartidor()
    {
        return $this->hasOne(Transporte_Repartidor::class,'idRepartidor','idrepartidor');
    }

}
