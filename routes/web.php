<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum', 'admin']], function() {
    Route::get('/', \App\Http\Controllers\Admin\IndexController::class)->name('admin.index');

    Route::group(['prefix' => 'users'], function() {
        Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('admin.user.index');
        Route::get('/create', \App\Http\Controllers\Admin\User\CreateController::class)->name('admin.user.create');
        Route::post('/', \App\Http\Controllers\Admin\User\StoreController::class)->name('admin.user.store');
        Route::get('/{user}', \App\Http\Controllers\Admin\User\ShowController::class)->name('admin.user.show');
        Route::get('/{user}/edit', \App\Http\Controllers\Admin\User\EditController::class)->name('admin.user.edit');
        Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('admin.user.update');
        Route::delete('/{user}', \App\Http\Controllers\Admin\User\DestroyController::class)->name('admin.user.destroy');
    });

    Route::group(['prefix' => 'category'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Category\IndexController::class)->name('admin.category.index');
        Route::get('/create', \App\Http\Controllers\Admin\Category\CreateController::class)->name('admin.category.create');
        Route::post('/', \App\Http\Controllers\Admin\Category\StoreController::class)->name('admin.category.store');
        Route::get('/{category}', \App\Http\Controllers\Admin\Category\ShowController::class)->name('admin.category.show');
        Route::get('/{category}/edit', \App\Http\Controllers\Admin\Category\EditController::class)->name('admin.category.edit');
        Route::patch('/{category}', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('admin.category.update');
        Route::delete('/{category}', \App\Http\Controllers\Admin\Category\DeleteController::class)->name('admin.category.destroy');
    });

    Route::group(['prefix' => 'subcategory'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Subcategory\IndexController::class)->name('admin.subcategory.index');
        Route::get('/create', \App\Http\Controllers\Admin\Subcategory\CreateController::class)->name('admin.subcategory.create');
        Route::post('/', \App\Http\Controllers\Admin\Subcategory\StoreController::class)->name('admin.subcategory.store');
        Route::get('/{subcategory}', \App\Http\Controllers\Admin\Subcategory\ShowController::class)->name('admin.subcategory.show');
        Route::get('/{subcategory}/edit', \App\Http\Controllers\Admin\Subcategory\EditController::class)->name('admin.subcategory.edit');
        Route::patch('/{subcategory}', \App\Http\Controllers\Admin\Subcategory\UpdateController::class)->name('admin.subcategory.update');
        Route::delete('/{subcategory}', \App\Http\Controllers\Admin\Subcategory\DeleteController::class)->name('admin.subcategory.destroy');
    });

    Route::group(['prefix' => 'color'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Color\IndexController::class)->name('admin.color.index');
        Route::get('/create', \App\Http\Controllers\Admin\Color\CreateController::class)->name('admin.color.create');
        Route::post('/', \App\Http\Controllers\Admin\Color\StoreController::class)->name('admin.color.store');
        Route::get('/{color}', \App\Http\Controllers\Admin\Color\ShowController::class)->name('admin.color.show');
        Route::get('/{color}/edit', \App\Http\Controllers\Admin\Color\EditController::class)->name('admin.color.edit');
        Route::patch('/{color}', \App\Http\Controllers\Admin\Color\UpdateController::class)->name('admin.color.update');
        Route::delete('/{color}', \App\Http\Controllers\Admin\Color\DeleteController::class)->name('admin.color.destroy');
    });

    Route::group(['prefix' => 'company'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Company\IndexController::class)->name('admin.company.index');
        Route::get('/create', \App\Http\Controllers\Admin\Company\CreateController::class)->name('admin.company.create');
        Route::post('/', \App\Http\Controllers\Admin\Company\StoreController::class)->name('admin.company.store');
        Route::get('/{company}', \App\Http\Controllers\Admin\Company\ShowController::class)->name('admin.company.show');
        Route::get('/{company}/edit', \App\Http\Controllers\Admin\Company\EditController::class)->name('admin.company.edit');
        Route::patch('/{company}', \App\Http\Controllers\Admin\Company\UpdateController::class)->name('admin.company.update');
        Route::delete('/{company}', \App\Http\Controllers\Admin\Company\DeleteController::class)->name('admin.company.destroy');
    });

    Route::group(['prefix' => 'group'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Group\IndexController::class)->name('admin.group.index');
        Route::get('/create', \App\Http\Controllers\Admin\Group\CreateController::class)->name('admin.group.create');
        Route::post('/', \App\Http\Controllers\Admin\Group\StoreController::class)->name('admin.group.store');
        Route::get('/{group}', \App\Http\Controllers\Admin\Group\ShowController::class)->name('admin.group.show');
        Route::get('/{group}/edit', \App\Http\Controllers\Admin\Group\EditController::class)->name('admin.group.edit');
        Route::patch('/{group}', \App\Http\Controllers\Admin\Group\UpdateController::class)->name('admin.group.update');
        Route::delete('/{group}', \App\Http\Controllers\Admin\Group\DeleteController::class)->name('admin.group.destroy');
    });

    Route::group(['prefix' => 'product'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Product\IndexController::class)->name('admin.product.index');
        Route::get('/create', \App\Http\Controllers\Admin\Product\CreateController::class)->name('admin.product.create');
        Route::post('/', \App\Http\Controllers\Admin\Product\StoreController::class)->name('admin.product.store');
        Route::get('/{product}', \App\Http\Controllers\Admin\Product\ShowController::class)->name('admin.product.show');
        Route::get('/{product}/edit', \App\Http\Controllers\Admin\Product\EditController::class)->name('admin.product.edit');
        Route::patch('/{product}', \App\Http\Controllers\Admin\Product\UpdateController::class)->name('admin.product.update');
        Route::delete('/{product}', \App\Http\Controllers\Admin\Product\DeleteController::class)->name('admin.product.destroy');
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Order\IndexController::class)->name('admin.order.index');
        Route::get('/{order}', \App\Http\Controllers\Admin\Order\ShowController::class)->name('admin.order.show');
        Route::patch('/{order}', \App\Http\Controllers\Admin\Order\UpdateController::class)->name('admin.order.update');
    });
});

Route::get('/{page}', \App\Http\Controllers\API\IndexController::class)->where('page', '.*')->name('home');
