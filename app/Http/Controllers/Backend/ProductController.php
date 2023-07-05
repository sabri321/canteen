<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
 
    public function index()
    {
        $product = Product::where('user_id', auth()->user()->id)->get();
        // Mengirimkan data pengguna ke view 'users.index'
        return view('product.index', compact('product') );
    }

    public function create()
    {
        $product = Product::all();
        $category = Category::all();
        return view('product.create', compact('product', 'category'));
    }

 
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'qty' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('product');
        }
        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['category_id'] = auth()->user()->id;
        Product::create($validatedData);

        return redirect()->route('product.create')->with('success', 'product created successfully.');
    }


    public function show(string $id)
    {
        
    }

    
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        $category = Category::all();
        // Atau gunakan metode lain untuk mengambil data pengguna berdasarkan ID

        return view('product.edit', compact('product', 'category'));
    }


   
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'qty' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->file('image')) {
            // Hapus gambar lama (jika ada)
            if ($product->image) {
                Storage::delete($product->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('images');
            $validatedData['image'] = $imagePath;
        }

        Product::where('id', $product->id)->update($validatedData);
        return redirect()->route('product.index', $product->id)->with('success', 'Product updated successfully.');
    }

  
    // public function destroy(string $id)
    // {
    //      // Jika terdapat gambar pengguna:
    //     if ($product->image) {
    //         // Hapus gambar dari folder public/images
    //         Storage::delete($product->image);
    //     }

    //     // Hapus data pengguna dari database
    //     Product::destroy($product->id);

    //     // Kembali ke halaman index dengan pesan sukses
    //     return redirect()->route('product.index')->with('success', 'product deleted successfully.');
    // }

    public function destroy(string $id)
{
    // Temukan produk berdasarkan ID
    $product = Product::find($id);

    // Jika produk tidak ditemukan, kembalikan response atau lakukan penanganan kesalahan lainnya
    if (!$product) {
        return redirect()->route('product.index')->with('error', 'Product not found.');
    }

    // Jika terdapat gambar produk:
    if ($product->image) {
        // Hapus gambar dari folder public/images
        Storage::delete($product->image);
    }

    // Hapus data produk dari database
    $product->delete();

    // Kembali ke halaman index dengan pesan sukses
    return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
}

}
