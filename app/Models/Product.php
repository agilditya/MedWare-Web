<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'image',
        'productName',
        'composition',
        'sideEffects',
        'stock',
        'price',
        'code',
        'description',
        'expired',
        'category'
    ];
}
