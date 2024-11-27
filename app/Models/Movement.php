<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [
        'product_id',
        'cantidad',
        'precio',
        'subtotal',
        'tipo',
        'user_id',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class); // O `Usuario` si usas otro modelo
    }
}
