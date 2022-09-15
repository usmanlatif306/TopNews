<?php

use App\Http\Controllers\Admin\GeneralController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/



Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

    Route::group(['as' => 'admin.', 'middleware' => 'auth'], function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        Route::get('categories', [GeneralController::class, 'categories'])->name('categories');
        Route::get('seo', [SeoController::class, 'index'])->name('seo.index');
        Route::post('seo', [SeoController::class, 'store'])->name('seo.store');
        Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('settings', [SettingController::class, 'store'])->name('settings.store');
        Route::get('settings/account', [SettingController::class, 'account'])->name('settings.account');
        Route::post('settings/image', [SettingController::class, 'profile_image'])->name('settings.image');
        Route::post('settings/profile', [SettingController::class, 'general'])->name('settings.profile');
    });
});
