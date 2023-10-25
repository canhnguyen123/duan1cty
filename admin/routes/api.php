<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tourController;

// Route::middleware(['auth:api'])->group(function () {
        Route::prefix('/api')->group(function(){
                Route::get('/list-tour', [tourController::class, 'getLisTAPI']);
         });

// });
