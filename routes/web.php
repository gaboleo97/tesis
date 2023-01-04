<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Front
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('/products/{category}', [App\Http\Controllers\HomeController::class, 'productByCategory'])->name('products.category');
Route::get('/productoDetalle', [App\Http\Controllers\HomeController::class, 'productoDetalle'])->name('productoDetalle');
Route::get('/nosotros', [App\Http\Controllers\HomeController::class, 'nosotros'])->name('nosotros');
Route::get('/contacto', [App\Http\Controllers\HomeController::class, 'contacto'])->name('contacto');
Route::get('/envioMail', [App\Http\Controllers\HomeController::class, 'envioMail'])->name('envioMail');
Route::get('/admin/index', function(){
    return view('admin/index');
})-> middleware('auth');

// Categorias
Route::get('/admin/categories', [App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
Route::post('/admin/categories/store', [App\Http\Controllers\Admin\CategoriesController::class, 'store'])->name('admin.categories.store');
Route::post('/admin/categories/{categoryId}/update', [App\Http\Controllers\Admin\CategoriesController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{categoryId}/delete', [App\Http\Controllers\Admin\CategoriesController::class, 'delete'])->name('admin.categories.delete');

// Proovedores
Route::get('/admin/providers', [App\Http\Controllers\Admin\ProvidersController::class, 'index'])->name('admin.providers');
Route::post('/admin/providers/store', [App\Http\Controllers\Admin\ProvidersController::class, 'store'])->name('admin.providers.store');
Route::post('/admin/providers/{providerId}/update', [App\Http\Controllers\Admin\ProvidersController::class, 'update'])->name('admin.providers.update');
Route::delete('/admin/providers/{providerId}/delete', [App\Http\Controllers\Admin\ProvidersController::class, 'delete'])->name('admin.providers.delete');

// Productos
Route::get('/admin/products', [App\Http\Controllers\Admin\ProductsController::class, 'index'])->name('admin.products');
Route::post('/admin/products/store', [App\Http\Controllers\Admin\ProductsController::class, 'store'])->name('admin.products.store');
Route::post('/admin/products/{productId}/update', [App\Http\Controllers\Admin\ProductsController::class, 'update'])->name('admin.products.update');
Route::delete('/admin/products/{productId}/delete', [App\Http\Controllers\Admin\ProductsController::class, 'delete'])->name('admin.products.delete');

// invetario
Route::post('/admin/products/{productId}/addInventory', [App\Http\Controllers\Admin\ProductsController::class, 'addInventory'])->name('admin.products.addInventory');
// Control de Stock
Route::get('/admin/controlStock', [App\Http\Controllers\Admin\ProductsController::class, 'stock'])->name('admin.controlStock');
Route::post('/admin/controlStock/updateStock', [App\Http\Controllers\Admin\ProductsController::class, 'updateStock'])->name('admin.controlStock.updateStock');


//Home Admin
Route::get('/admin/index', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.index');
Route::post('/deleteVencidos', [App\Http\Controllers\Admin\HomeController::class, 'deleteVencidos'])->name('admin.deleteVencidos');
Route::get('/admin/table-datatable', [App\Http\Controllers\Admin\HomeController::class, 'datatable'])->name('admin.table-datatable');
//Proveedores


// Mails


Auth::routes();


