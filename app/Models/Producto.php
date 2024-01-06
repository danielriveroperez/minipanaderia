<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'precio', 'descripcion', 'cliente_id'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class); // Un producto pertenece a un cliente
    }

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class)->withPivot('cantidad', 'precio'); // Un producto puede estar en varios pedidos
    }
    
}
