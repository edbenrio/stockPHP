<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'stock_actual', 'precio', 'category_id'];

    public function movements()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
