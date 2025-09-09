<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        return view('admin.products.index');
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|in:makanan,kerajinan,pertanian',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'phone' => 'nullable|string|max:20',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->phone = $request->phone;

        // Handle image upload
        if ($request->hasFile('image')) {
            \Log::info('Image upload detected', [
                'file_name' => $request->file('image')->getClientOriginalName(),
                'file_size' => $request->file('image')->getSize(),
                'file_type' => $request->file('image')->getMimeType()
            ]);
            
            $image = $request->file('image');
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('products', $imageName, 'public');
            $product->image_path = '/storage/' . $imagePath;
            
            \Log::info('Image stored successfully', [
                'image_name' => $imageName,
                'image_path' => $imagePath,
                'storage_url' => $product->image_path
            ]);
        } else {
            \Log::info('No image file provided');
        }

        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'product' => $product
        ]);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'category' => 'required|string|in:makanan,kerajinan,pertanian',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'phone' => 'nullable|string|max:20',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->category = $request->category;
        $product->phone = $request->phone;

        // Handle image removal
        if ($request->remove_image == '1') {
            if ($product->image_path) {
                $oldImagePath = str_replace('/storage/', 'public/', $product->image_path);
                Storage::delete($oldImagePath);
            }
            $product->image_path = null;
        }

        // Handle new image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($product->image_path) {
                $oldImagePath = str_replace('/storage/', 'public/', $product->image_path);
                Storage::delete($oldImagePath);
            }

            $image = $request->file('image');
            $imageName = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('products', $imageName, 'public');
            $product->image_path = '/storage/' . $imagePath;
        }

        $product->save();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diupdate',
            'product' => $product
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Delete image if exists
        if ($product->image_path) {
            $imagePath = str_replace('/storage/', 'public/', $product->image_path);
            Storage::delete($imagePath);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus'
        ]);
    }
}
