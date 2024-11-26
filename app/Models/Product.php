<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'stock_actual'];

    public function movements()
    {
        return $this->hasMany(Movimiento::class);
    }
}
