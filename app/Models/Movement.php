<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movement extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'cantidad',
        'precio',
        'subtotal',
        'tipo',
        'user_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class); // O `Usuario` si usas otro modelo
    }
}
