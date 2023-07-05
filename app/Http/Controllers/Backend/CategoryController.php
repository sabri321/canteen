<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
         // Mendapatkan semua data pengguna (users) dari database
         $category = Category::all();

         // Mengirimkan data pengguna ke view 'users.index'
         return view('category.index', compact('category'));
    }

  
    public function create()
    {
        return view('category.create');
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        $category = Category::create($validatedData);

        return redirect()->route('category.create')->with('success', 'category created successfully.');
    }

   
    public function show(string $id)
    {
        //
    }

    
    public function edit(string $id)
    {
        $category = category::find($id);
        // Atau gunakan metode lain untuk mengambil data pengguna berdasarkan ID

        return view('category.edit', compact('category'));
    }

    
    // public function update(Request $request, string $id)
    // {
    //     //
    // }
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => 'required',
   
        ]);

       

        Category::where('id', $category->id)->update($validatedData);
        return redirect()->route('category.index', $category->id)->with('success', 'Category updated successfully.');
    }

    
    public function destroy(Category $category)
    {
        // Hapus data pengguna dari database
        Category::destroy($category->id);

        // Kembali ke halaman index dengan pesan sukses
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
