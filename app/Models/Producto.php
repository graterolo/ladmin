<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'serial', 'categoria_id', 'unidad_id', 'marca_id', 
    'activo', 'costo', 'utilidad1', 'utilidad2', 'utilidad3', 'utilidad4', 'precio1',
    'precio2','precio3', 'precio4', 'exento', 'descripcion', 'empresa_id', 'url_img', 'user_id'];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
    public function inventario()
    {
        return $this->belongsTo(Inventario::class);
    }
    public function prodcategorias()
    {
        return $this->hasMany(ProdCategoria::class);
    }
    public function prodmarcas()
    {
        return $this->hasMany(ProdMarca::class);
    }
    public function produnidads()
    {
        return $this->hasMany(ProdUnidad::class);
    }
}
