<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
{
    $topFive = Product::orderBy('updated_at', 'desc')->take(4)->get();
    return view('Content.dashboard', compact('topFive'));
}
}
