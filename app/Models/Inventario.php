<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $fillable = ['empresa_id', 'deposito_id', 'producto_id', 'cantidad', 
    'activo', 'limite_stock', 'user_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
    public function invdeposito()
    {
        return $this->belongsTo(InvDeposito::class, 'deposito_id');
    }
    public function inventariodets()
    {
        return $this->hasMany(InventarioDet::class);
    }
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
