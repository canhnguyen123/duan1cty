<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\adminController;
use App\Http\Controllers\tourController;
use App\Http\Controllers\postDeatilController;
use App\Http\Controllers\serviceController;
Route::get('/', [adminController::class, 'home'])->name('home');
Route::prefix('/page')->group(function(){
    Route::prefix('/tour')->group(function(){
        Route::get('/list', [tourController::class, 'list'])->name('tour_list');
        Route::get('/add', [tourController::class, 'add'])->name('tour_add');
        Route::post('/post-add', [tourController::class, 'addPost'])->name('tour_post_add');
        Route::get('/update/{category_tour_id}', [tourController::class, 'update'])->name('tour_update');
        Route::put('/post-update/{category_tour_id}', [tourController::class, 'updatePost'])->name('tour_post_update');
        Route::get('/toggle-status/{category_tour_id}/{category_tour_status}', [tourController::class, 'toogle_status'])->name('tour_toogle_status');
    });   
    Route::prefix('/tour-deatil')->group(function(){
        Route::get('/list', [postDeatilController::class, 'list'])->name('tour_deatil_list');
        Route::get('/add', [postDeatilController::class, 'add'])->name('tour_deatil_add');
        Route::post('/post-add', [postDeatilController::class, 'addPost'])->name('tour_deatil_post_add');
        Route::get('/update/{tourDeatil_id}', [postDeatilController::class, 'update'])->name('tour_deatil_update');
        Route::put('/post-update/{tourDeatil_id}', [postDeatilController::class, 'updatePost'])->name('tour_deatil_post_update');
        Route::get('/deatil/{tourDeatil_id}', [postDeatilController::class, 'update'])->name('tour_deatil_deatil');
        Route::get('/toggle-status/{tourDeatil_id}/{tourDeatil_status}', [postDeatilController::class, 'toogle_status'])->name('tour_deatil_toogle_status');
    });   
    Route::prefix('/service')->group(function(){
        Route::get('/list', [serviceController::class, 'list'])->name('service_list');
        Route::get('/add', [serviceController::class, 'add'])->name('service_add');
        Route::post('/post-add', [serviceController::class, 'addPost'])->name('service_post_add');
        Route::get('/update/{service_id}', [serviceController::class, 'update'])->name('service_update');
        Route::put('/post-update/{service_id}', [serviceController::class, 'updatePost'])->name('service_post_update');
        Route::get('/toggle-status/{service_id}/{service_status}', [serviceController::class, 'toogle_status'])->name('service_toogle_status');
    }); 
});