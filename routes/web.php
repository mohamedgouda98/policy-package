<?php

use Illuminate\Support\Facades\Route;
use Unlimited\Policy\Http\Controllers\admin\PolicyCategoryController;
use Unlimited\Policy\Http\Controllers\admin\PolicyController;
use Unlimited\Policy\Http\Controllers\enduser\PolicyEnduserController;

Route::group(['prefix' => config('policyPackage.routerPrefix'),
], function (){
    Route::group(['prefix' => 'policy_category', 'as' => 'policyPackage.'], function(){
        Route::get('/index', [PolicyCategoryController::class, 'index'])->name('index');
        Route::get('/create', [PolicyCategoryController::class, 'create']);
        Route::post('/store', [PolicyCategoryController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PolicyCategoryController::class, 'edit'])->name('edit');
        Route::put('/update', [PolicyCategoryController::class, 'update'])->name('update');
        Route::delete('/delete', [PolicyCategoryController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => 'policy', 'as' => 'policy.'], function(){
        Route::get('/index', [PolicyController::class, 'index'])->name('index');
        Route::get('/create', [PolicyController::class, 'create']);
        Route::post('/store', [PolicyController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [PolicyController::class, 'edit'])->name('edit');
        Route::put('/update', [PolicyController::class, 'update'])->name('update');
        Route::delete('/delete', [PolicyController::class, 'delete'])->name('delete');
    });
});

Route::group(['prefix' => 'user'], function () {
    Route::get('/policies', [PolicyEnduserController::class, 'index']);
});

