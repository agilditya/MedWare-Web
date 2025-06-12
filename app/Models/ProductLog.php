<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'product_name',
        'action',
        'user_id',
        'created_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

