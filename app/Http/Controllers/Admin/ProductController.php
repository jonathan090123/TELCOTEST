<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        // Anda mungkin butuh daftar operator atau kategori ML untuk dropdown di view
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input sesuai Model
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'operator'     => 'required|string|max:50',      // Telkomsel, Indosat, dll
            'price'        => 'required|numeric|min:0',
            'description'  => 'nullable|string',
            'ml_category' => 'required|string|max:100',            // Kategori untuk Machine Learning (0-X)
            'is_popular'   => 'boolean',                     // Checkbox (1 or 0)
            'image'        => 'nullable|image|max:2048',     // Input type="file" name="image"
        ]);

        // 2. Handle Upload Gambar
        $imageUrl = null;
        if ($request->hasFile('image')) {
            // Simpan file, lalu ambil path-nya
            $imageUrl = $request->file('image')->store('product-images', 'public');
        }

        // 3. Simpan ke Database (Mapping Manual agar aman)
        Product::create([
            'product_name' => $validated['product_name'],
            'operator'     => $validated['operator'],
            'price'        => $validated['price'],
            'description'  => $validated['description'] ?? null,
            'ml_category'  => $validated['ml_category'],
            'is_popular'   => $request->has('is_popular') ? 1 : 0, // Handle checkbox
            'image_url'    => $imageUrl, // Simpan path gambar ke kolom image_url
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'operator'     => 'required|string|max:50',
            'price'        => 'required|numeric|min:0',
            'description'  => 'nullable|string',
            'ml_category'  => 'required|integer',
            'is_popular'   => 'boolean',
            'image'        => 'nullable|image|max:2048',
        ]);

        $imageUrl = $product->image_url; // Default pakai gambar lama

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
                Storage::disk('public')->delete($product->image_url);
            }
            // Upload gambar baru
            $imageUrl = $request->file('image')->store('product-images', 'public');
        }

        $product->update([
            'product_name' => $validated['product_name'],
            'operator'     => $validated['operator'],
            'price'        => $validated['price'],
            'description'  => $validated['description'] ?? null,
            'ml_category'  => $validated['ml_category'],
            'is_popular'   => $request->has('is_popular') ? 1 : 0,
            'image_url'    => $imageUrl,
        ]);

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil diupdate!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        
        // Hapus file fisik
        if ($product->image_url && Storage::disk('public')->exists($product->image_url)) {
            Storage::disk('public')->delete($product->image_url);
        }
        
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}