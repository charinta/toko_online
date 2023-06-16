<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product=Product::all();
        return view('index',compact('product'));
    }

    public function show($id)
    {
        $product=Product::findOrFail($id);
        return view('show',compact('product'));
    }

    public function create(){
        return view('create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $product = Product::create($validatedData);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dibuat',
            'data' => $product
        ], 201);
    }

    public function edit($id){
        $product=Product::findOrFail($id);
        return view('edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $product->update($validatedData);

        return redirect()->route('product.index')->with(['success'=>'Data Berhasil Diubah!']);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with(['success'=>'Data Berhasil Dihapus!']);
    }   

    public function getAvailableProduct(){
        $product = Product::where('stok', '>', 0)->get();

         return view('available', compact('product'));
    }

    public function getUnavailableProduct(){
        $product = Product::where('stok', 0)->get();

       return view('unavailable', compact('product'));
    }

    public function editstok($id){
        $product=Product::findOrFail($id);
        return view('stok', compact('product'));
    }
    public function updateStok(Request $request, $id)
{
    // Validasi data yang diterima dari permintaan
    $validatedData = $request->validate([
        'stok' => 'required|integer',
    ]);

    // Temukan produk berdasarkan ID
    $product = Product::findOrFail($id);

    // Perbarui nilai atribut stok produk
    $product->stok = $validatedData['stok'];

    // Simpan perubahan ke database
    $product->save();

    // Berikan respons atau lakukan pengalihan jika diperlukan
    return redirect()->route('product.index')->with(['success'=>'Data Berhasil Diubah!']);
}
}