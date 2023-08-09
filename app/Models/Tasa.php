<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasa extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'valor', 'empresa_id', 'user_id'];
}
