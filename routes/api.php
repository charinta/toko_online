<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('product', function() {
//     // If the Content-Type and Accept headers are set to 'application/json', 
//     // this will return a JSON structure. This will be cleaned up later.
//     return Product::all();
// });
 
// Route::get('product/{id}', function($id) {
//     return Product::find($id);
// });

// Route::post('product', function(Request $request) {
//     return Product::create($request->all);
// });

// Route::put('product/{id}', function(Request $request, $id) {
//     $product = Product::findOrFail($id);
//     $product->update($request->all());
//      return $product;
// });

// Route::delete('product/{id}', function($id) {
//     Product::find($id)->delete();

//     return 204;
// });

// Route::resource('product', ProductController::class);
Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('create', [ProductController::class, 'create'])->name('product.create');
Route::get('available', [ProductController::class, 'getAvailableProduct'])->name('product.available');
Route::get('unavailable', [ProductController::class, 'getUnavailableProduct'])->name('product.unavailable');
Route::get('product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('edit/{product}', [ProductController::class, 'edit'])->name('product.edit');
Route::put('product/{product}', [ProductController::class, 'update'])->name('product.update');
Route::get('stok/{product}', [ProductController::class, 'editstok'])->name('product.editstok');
Route::put('product/{id}/stock', [ProductController::class, 'updateStok'])->name('product.stok');
Route::post('product', [ProductController::class, 'store'])->name('product.store');
Route::delete('product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');