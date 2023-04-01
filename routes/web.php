<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\DistrictController;
use App\Http\Controllers\Backend\SubDistrictController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Fontend\ExtraController;
use App\Http\Controllers\Backend\AdvertismentController;




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
    return view('fontend.home');
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
Route::post('/edit/update/{id}', [PostController::class, 'update_post'])->name('update.post');
Route::get('delete/post/{id}', [PostController::class, 'post_delete'])->name('delete.post');


//social setting route is here========================
Route::get('/update/links', [SettingController::class, 'links_index'])->name('admin.update.social');
Route::post('/links/update/{id}', [SettingController::class, 'update_links'])->name('update_link');


Route::get('/update/seo', [SettingController::class, 'seo_index'])->name('admin.update.seo');
Route::post('/seo/update/{id}', [SettingController::class, 'update_seo'])->name('update.seo');


Route::get('/update/prayer', [SettingController::class, 'prayer_index'])->name('admin.update.prayer');
Route::post('/prayer/update/{id}', [SettingController::class, 'update_prayer'])->name('update.prayer');



Route::get('/update/liveTv', [SettingController::class, 'liveTv_index'])->name('admin.live.tv');
Route::post('/live/tv/update/{id}', [SettingController::class, 'update_liveTv'])->name('update.liv.tv');
Route::get('/active/liveTv/{id}', [SettingController::class, 'ActiveSetting'])->name('active.liveTv');
Route::get('/deactive/liveTv/{id}', [SettingController::class, 'DeactiveSetting'])->name('deactive.liveTv');



Route::get('/update/notice', [SettingController::class, 'notice_index'])->name('admin.notice');
Route::post('/notice/update/{id}', [SettingController::class, 'update_notice'])->name('update.notice');
Route::get('/active/notice/{id}', [SettingController::class, 'NoticeActiveSetting'])->name('active.notice');
Route::get('/deactive/notice/{id}', [SettingController::class, 'NoticeDeactiveSetting'])->name('deactive.notice');





Route::get('/website', [SettingController::class, 'website_index'])->name('admin.all.website');
Route::post('/store/website', [SettingController::class, 'Store_Website'])->name('store.website');
Route::post('/edit/website/{id}', [SettingController::class, 'update_website'])->name('update.website');
Route::get('delete/website/{id}', [SettingController::class, 'delete'])->name('delete.website');



Route::get('/photo', [GalleryController::class, 'photo_index'])->name('admin.all.photo');
Route::post('/store/photo', [GalleryController::class, 'Store_Photo'])->name('store.photo');
Route::post('/update/photo/{id}', [GalleryController::class, 'update_photo'])->name('update.photo');
Route::get('delete/photo/{id}', [GalleryController::class, 'delete'])->name('delete.photo');


Route::get('/videos', [GalleryController::class, 'video_index'])->name('admin.add.videos');
Route::get('/add/videos', [GalleryController::class, 'Add_Video'])->name('add.videos');
Route::post('/store/video', [GalleryController::class, 'Store_Video'])->name('store.video');
Route::get('/edit/video/{id}', [GalleryController::class, 'edit_video'])->name('edit.video');
Route::post('/video/update/{id}', [GalleryController::class, 'update_video'])->name('update.video');
Route::get('delete/video/{id}', [GalleryController::class, 'video_delete'])->name('delete.video');




//multi language route===================
Route::get('/english', [ExtraController::class, 'English'])->name('language.english');
Route::get('/hindi', [ExtraController::class, 'Hindi'])->name('language.hindi');

//fontend signle page route here===========
Route::get('/single/post/{id}', [ExtraController::class, 'SinglePost']);

//cateroy and subcategory route
Route::get('/catpost/{id}/{category_en}', [ExtraController::class, 'CategoryPost']);
Route::get('/subcatpost/{id}/{subcategory_en}', [ExtraController::class, 'SubCategoryPost']);

// json route for  district fontend
Route::get('/get/subdistrict/fontend/{district_id}', [ExtraController::class, 'GetSubDistrict']);

//serach route ===========
Route::get('/search/district', [ExtraController::class, 'Searching'])->name('search.district');

//admin ads route====
Route::get('/all/ads', [AdvertismentController::class, 'AllAds'])->name('admin.all.ads');
Route::post('/store/ads', [AdvertismentController::class, 'Store_ads'])->name('store.ads');
















