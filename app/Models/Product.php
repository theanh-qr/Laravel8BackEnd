<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";

    protected $fillable = [
        'name',
        'menu_id',
        'description',
        'content',
        'price',
        'price_sale',
        'active',
        'img',
    ];

    public function menu()
    {
        return $this->hasOne( Menu::class,'id','menu_id');
    }
}
