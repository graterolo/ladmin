<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvDeposito extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'acronimo', 'tipo', 'condicion',  
    'descripcion', 'empresa_id', 'user_id'];


    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }
    public function inventarios()
    {
        return $this->hasMany(Inventario::class);
    }
}

// para llamar al nombre de la empresa seria asi empresa->name;