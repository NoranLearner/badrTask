<?php

use App\Http\Controllers\back\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('back.index');
});

Route::get('/categories/tree', function () {
    return view('back.categories.tree', ['categories'=>Category::tree()]);
})->name('category_tree');

Route::delete('/categories/delete-selected', [CategoryController::class, 'deleteCheckedCategories'])->name('category.deleteSelected');

// Route::get('search-category',[CategoryController::class, 'searchCategory']);

Route::resource('categories', CategoryController::class);

