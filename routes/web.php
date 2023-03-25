<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;




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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home');
    })->name('dashboard');
});

//logout route
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');


//all admin category route
Route::get('/category', [CategoryController::class, 'index'])->name('admin.category');
Route::post('/category', [CategoryController::class, 'store_category'])->name('store.category');
Route::post('/edit/category/{id}', [CategoryController::class, 'update_category'])->name('update.category');
Route::get('delete/category/{id}', [CategoryController::class, 'delete'])->name('delete.category');

//all admin sub-category route
Route::get('/sub/category', [SubCategoryController::class, 'index'])->name('admin.subcategory');
Route::post('/store/category', [SubCategoryController::class, 'store_subcategory'])->name('store.subcategory');
Route::get('/edit/subcategory/{id}', [SubCategoryController::class, 'editsubcat'])->name('edit.subcategory');
Route::post('/update/subcategory/{id}', [SubCategoryController::class, 'update_subcategory'])->name('update.subcategory');
Route::get('delete/subcategory/{id}', [SubCategoryController::class, 'delete_subcategory'])->name('delete.subcategory');




//all admin district route
Route::get('/district', [DistrictController::class, 'index'])->name('admin.district');
Route::post('/store/district', [DistrictController::class, 'store_district'])->name('store.district');
Route::post('/edit/district/{id}', [DistrictController::class, 'update_district'])->name('update.district');
Route::get('delete/district/{id}', [DistrictController::class, 'delete'])->name('delete.district');




//all admin sub district route
Route::get('/sub/district', [SubDistrictController::class, 'index'])->name('admin.subdistrict');
Route::post('/store/subdistrict', [SubDistrictController::class, 'store_subdistrict'])->name('store.subdistrict');
Route::get('/edit/subdistrict/{id}', [SubDistrictController::class, 'editsubdist'])->name('edit.subdistrict');
Route::post('/edit/subdistrict/{id}', [SubDistrictController::class, 'update_subdistrict'])->name('update.subdistrict');
Route::get('delete/subdistrict/{id}', [SubDistrictController::class, 'delete'])->name('delete.subdistrict');

// json route for category and district
Route::get('/get/subcategory/{category_id}', [PostController::class, 'GetSubCategory']);

Route::get('/get/subdistrict/{district_id}', [PostController::class, 'GetSubDistrict']);


//all admin post route
Route::get('/add/post', [PostController::class, 'index'])->name('admin.add.post');

Route::post('/store', [PostController::class, 'store_post'])->name('store.post');

Route::get('/all/post', [PostController::class, 'all_post'])->name('admin.all.post');

Route::get('/edit/post/{id}', [PostController::class, 'edit_post'])->name('edit.post');

