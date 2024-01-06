<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'direccion', 'correo'];

    public function productos()
    {
        return $this->hasMany(Producto::class); // Un cliente tiene muchos productos
    }

}