<?php

use App\Http\Controllers\back\CategoryController;
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
    return view('back/index');
});

Route::delete('/categories/delete-selected', [CategoryController::class, 'deleteCheckedCategories'])->name('category.deleteSelected');

// Route::get('search-category',[CategoryController::class, 'searchCategory']);

Route::resource('categories', CategoryController::class);

