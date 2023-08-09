<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarioDet extends Model
{
    use HasFactory;
    protected $fillable = ['inventario_id', 'fvence', 'lote', 'cantidad', 'user_id'];

    public function inventario()
    {
        return $this->belongsTo(Inventario::class, 'inventario_id');
    }
}
