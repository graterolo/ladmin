<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Empresa extends Model
{
    use HasFactory, HasRoles;
    protected $fillable = ['name', 'acronimo', 'rif', 'telef', 'direccion', 
    'email','tipo', 'descripcion', 'supempresa_id'];
    

    // public function prodcategorias()
    // {
    //     return $this->hasMany(ProdCategoria::class);
    // }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
    public function invdepositos()
    {
        return $this->hasMany(InvDeposito::class);
    }
}
