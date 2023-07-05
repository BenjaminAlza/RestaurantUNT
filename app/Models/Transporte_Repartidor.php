<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transporte_Repartidor extends Model
{
    use HasFactory;

    protected $table = 'repartidor';
    protected $primaryKey='idrepartidor';
    public $timestamps=false;
    protected $fillable = [
        'dni',
        'nombres',
        'direccion',
        'email',
        'telefono',
        'sueldo'
    ];

    public function delivery()
    {
        return $this->hasMany(Transporte_Delivery::class,'idRepartidor','idRepartidor');
    }
    
}
