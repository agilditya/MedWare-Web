<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('Content.dashboard', compact('dashboard'));
    }

    public function create()
    {
        return view('Content.addProduct');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'productName' => ['required', 'string', 'max:255'],
            'code' => ['required', 'string', 'max:6', 'unique:products'],
            'composition' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'sideEffects' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'expired' => ['required', 'date'],
            'stock' => ['required', 'integer'],
            'category' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ], [
            'productName.required' => '*Product name is required',
            'productName.string' => '*Product name must be a string',
            'productName.max' => '*Product name cannot exceed 255 characters',
        
            'code.required' => '*Code is required',
            'code.max' => '*Code cannot exceed 6 characters',
            'code.unique' => '*Code must be unique',

            'image.image' => '*File must be an image',
            'image.mimes' => '*Image must be jpg, jpeg, or png',
            'image.max' => '*Image size must not exceed 2MB',

            'expired.required' => '*Expiration date is required',
            'expired.date' => '*Expiration date must be a valid date',

            'stock.required' => '*Stock is required',
            'stock.integer' => '*Stock must be a number',
        
            'category.required' => '*Category is required',
            'category.string' => '*Category must be a string',

            'price.required' => '*Price is required',
            'price.integer' => '*Price must be a number',
        ]);
        

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }
    
        Product::create($validated);
    
        return redirect()->route('content.dashboard')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'productName' => 'required|string|max:255',
            'composition' => 'nullable|string',
            'sideEffects' => 'nullable|string',
            'stock' => 'required|integer',
            'price' => 'required|integer',
            'code' => 'required|string|max:6|unique:products,code,' . $product->id,
            'description' => 'nullable|string',
            'expired' => 'required|date',
            'category' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}

