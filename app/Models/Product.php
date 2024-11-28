<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'stock_actual', 'precio', 'category_id'];

    public function movements()
    {
        return $this->hasMany(Movimiento::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
