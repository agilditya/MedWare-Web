<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
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
