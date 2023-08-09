<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdCategoria extends Model
{
    use HasFactory;
    protected $fillable = ['codigo', 'name', 'descripcion', 'empresa_id', 'user_id'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

}
