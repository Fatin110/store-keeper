<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\DemoController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('welcome');

Route::get('/dashboard', [DemoController::class, 'totalSalesOnDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get("insert_product", function(){
    return view('insert_product');
})->name('insert_product');

Route::get("update_product", [DemoController::class,"showTableForUpdate"])->name('update_product');

Route::post('/save-product', [DemoController::class, 'insertProduct'])->name('save.product');

Route::get("transaction_history", [DemoController::class,"showTransactionHistory"])->name('transaction_history');

Route::post('/update-product', function (Request $request) {
    // Insert data into the 'products' table using query builder
    // DB::table('products')->insert([
    //     'name' => $request->input('name'),
    //     'price' => $request->input('price'),
    //     'quantity' => $request->input('quantity'),
    // ]);

    // Redirect back or to another page after insertion
    // return redirect()->back()->with('success', 'Product added successfully!');
})->name('update.product');

Route::get('delete_product/{param}', [DemoController::class, 'deleteProduct'] )->name('delete_product');

Route::get('update_specific_product/{param}', [DemoController::class, 'updateSpecificProduct'] )->name('update_specific_product');

Route::post('/save_specific_product', [DemoController::class, 'saveSpecificProduct'])->name('update.product');

Route::get('/product_sold/{param}', [DemoController::class, 'productSold'])->name('product_sold');

Route::post('/sold-amount', [DemoController::class, 'soldAmount'])->name('sold-amount');


require __DIR__.'/auth.php';
