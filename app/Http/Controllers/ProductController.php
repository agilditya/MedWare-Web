<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductLog;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->get();
        return view('Content.allProduct', compact('products'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('productName', 'like', "%{$query}%")

                            ->orWhere('code', 'like', "%{$query}%")
                            ->orWhere('category', 'like', "%{$query}%")
                            ->latest()
                            ->get();
        return view('Content.allProduct', compact('products'));
    }

    public function payment()  {
        $payment = Product::latest()->get();
        return view('Content.payment', compact('payment'));
    }

    public function processSell(Request $request)
    {
        $items = $request->input('cart');

        foreach ($items as $item) {
            $product = Product::find($item['id']);

            if ($product) {
                if ($product->stock >= $item['qty']) {
                    $product->stock -= $item['qty'];
                    $product->save();
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => "Stok tidak mencukupi untuk {$product->productName}"
                    ], 400);
                }
            }
        }

        return response()->json(['success' => true]);
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
            $file = $request->file('image');
            $productName = strtolower(str_replace(' ', '_', $request->productName));
            $extension = $file->getClientOriginalExtension();
            $filename = $productName . '.' . $extension;
            $path = $file->storeAs('products', $filename, 'public');
            $validated['image'] = $path;
        }
    
        Product::create($validated);
    
        return redirect()->route('Content.dashboard')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('Content.editProduct', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'productName' => ['required', 'string', 'max:255'],
            'code' => 'required|string|max:6|unique:products,code,' . $product->id,
            'composition' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'sideEffects' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'expired' => ['required', 'date'],
            'stock' => ['required', 'integer'],
            'category' => ['required', 'string'],
            'price' => ['required', 'integer'],
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $productName = strtolower(str_replace(' ', '_', $request->productName));
            $extension = $file->getClientOriginalExtension();
            $filename = $productName . '.' . $extension;
            $path = $file->storeAs('products', $filename, 'public');
            $validated['image'] = $path;
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

    public function medLog(Request $request)
    {
        $logs = ProductLog::with('user')->latest()->get();
        return view('Content.medlog', compact('logs'));
    }
}