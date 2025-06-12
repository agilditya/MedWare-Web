<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\ProductLog;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    public function created(Product $product)
    {
        ProductLog::create([
            'product_id' => $product->id,
            'product_name' => $product->productName,
            'action' => 'ADD',
            'user_id' => Auth::id(),
            'created_at' => now(),
        ]);
    }

    public function updated(Product $product)
    {
        ProductLog::create([
            'product_id' => $product->id,
            'product_name' => $product->productName,
            'action' => 'UPDATE',
            'user_id' => Auth::id(),
            'created_at' => now(),
        ]);
    }

    public function deleted(Product $product)
    {
        ProductLog::create([
            'product_id' => $product->id,
            'product_name' => $product->productName,
            'action' => 'DELETE',
            'user_id' => Auth::id(),
            'created_at' => now(),
        ]);
    }
}

