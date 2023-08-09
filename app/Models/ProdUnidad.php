<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdUnidad extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'descripcion', 'empresa_id', 'user_id'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
