<?php

use Modules\Portal\Http\Controllers\Frontend\HomeController;
use Modules\Portal\Http\Controllers\Frontend\ProfileController;
use Modules\Portal\Http\Controllers\Frontend\OfferController;
use Modules\Portal\Http\Controllers\Frontend\OfferFavouriteController;
use Modules\Portal\Http\Controllers\Frontend\OfferCategoryController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('profile/{username}', [ProfileController::class, 'show'])->name('profile');

Route::get('offers/search', [OfferController::class, 'search'])->name('offers.search');
Route::get('offers/favourites', [OfferFavouriteController::class, 'index'])->name('offers.favourites');
Route::get('offers/favourites/change', [OfferFavouriteController::class, 'change'])->name('offers.favourites.change');

Route::resource('offers', OfferController::class)->except(['index', 'create', 'edit', 'update']);

Route::prefix('my-account')->group(function () {
    Route::get('offers', [OfferController::class, 'index'])->name('profile.offers.index');
    Route::get('offers/create', [OfferController::class, 'create'])->name('profile.offers.create');
    Route::get('offers/{id}/edit', [OfferController::class, 'edit'])->name('profile.offers.edit');
    Route::put('offers/{id}', [OfferController::class, 'update'])->name('profile.offers.update');
});

Route::get('categories/{slug}', [OfferCategoryController::class, 'show'])->name('categories.show');
