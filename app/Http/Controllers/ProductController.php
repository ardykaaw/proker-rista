<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::orderByDesc('created_at')->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:32',
            'image' => 'nullable|image|max:2048',
            'image_path' => 'nullable|string|max:1024',
        ]);

        $imagePath = $validated['image_path'] ?? null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $imagePath = '/storage/' . $imagePath;
        }

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'category' => $validated['category'] ?? null,
            'image_path' => $imagePath,
            'phone' => $validated['phone'] ?? null,
        ]);
        return response()->json($product, Response::HTTP_CREATED);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'sometimes|required|integer|min:0',
            'stock' => 'sometimes|required|integer|min:0',
            'category' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:32',
            'image' => 'nullable|image|max:2048',
            'image_path' => 'nullable|string|max:1024',
        ]);

        $updateData = $validated;
        if ($request->hasFile('image')) {
            $storedPath = $request->file('image')->store('products', 'public');
            $updateData['image_path'] = '/storage/' . $storedPath;
        }

        $product->update($updateData);
        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}


