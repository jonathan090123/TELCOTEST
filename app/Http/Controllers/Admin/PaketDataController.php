<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaketData;

class PaketDataController extends Controller
{
    public function index()
    {
        $pakets = PaketData::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.paket-data.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.paket-data.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required|string|max:191',
            'ml_category' => 'nullable|string|max:191',
            'operator' => 'nullable|string|max:50',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_popular' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
            $destination = public_path('img/paket-data');
            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['image_url'] = 'img/paket-data/' . $filename;
        }

        $data['is_popular'] = $request->has('is_popular') ? (bool)$request->input('is_popular') : false;

        PaketData::create([
            'product_name' => $data['product_name'],
            'ml_category' => $data['ml_category'] ?? null,
            'operator' => $data['operator'] ?? null,
            'price' => $data['price'],
            'description' => $data['description'] ?? null,
            'image_url' => $data['image_url'] ?? null,
            'is_popular' => $data['is_popular'],
            'status' => 'active',
        ]);

        return redirect()->route('admin.paket-data.index')->with('success', 'Paket berhasil dibuat.');
    }

    public function show($id)
    {
        $paket = PaketData::findOrFail($id);
        return view('admin.paket-data.show', compact('paket'));
    }

    public function edit($id)
    {
        $paket = PaketData::findOrFail($id);
        return view('admin.paket-data.edit', compact('paket'));
    }

    public function update(Request $request, $id)
    {
        $paket = PaketData::findOrFail($id);

        $data = $request->validate([
            'product_name' => 'required|string|max:191',
            'ml_category' => 'nullable|string|max:191',
            'operator' => 'nullable|string|max:50',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_popular' => 'nullable|boolean',
            'status' => 'nullable|in:active,inactive',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9_\-\.]/', '_', $file->getClientOriginalName());
            $destination = public_path('img/paket-data');
            if (!is_dir($destination)) {
                mkdir($destination, 0755, true);
            }
            $file->move($destination, $filename);
            $data['image_url'] = 'img/paket-data/' . $filename;
        }

        $data['is_popular'] = $request->has('is_popular') ? (bool)$request->input('is_popular') : false;

        $paket->update([
            'product_name' => $data['product_name'],
            'ml_category' => $data['ml_category'] ?? null,
            'operator' => $data['operator'] ?? null,
            'price' => $data['price'],
            'description' => $data['description'] ?? null,
            'image_url' => $data['image_url'] ?? $paket->image_url,
            'is_popular' => $data['is_popular'],
            'status' => $data['status'] ?? $paket->status,
        ]);

        return redirect()->route('admin.paket-data.index')->with('success', 'Paket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $paket = PaketData::findOrFail($id);
        // optionally delete image file
        if ($paket->image_url) {
            $path = public_path($paket->image_url);
            if (is_file($path)) {
                @unlink($path);
            }
        }
        $paket->delete();
        return redirect()->route('admin.paket-data.index')->with('success', 'Paket berhasil dihapus.');
    }
}
