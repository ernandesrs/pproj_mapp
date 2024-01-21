<?php

use App\Livewire\Admin\Home as AdminHome;

use App\Livewire\Dash\Home as DashHome;

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin'
], function () {

    Route::get('', AdminHome::class)->name('admin.home');

});

Route::group([
    'prefix' => 'dash'
], function () {

    Route::get('', DashHome::class)->name('dash.home');

});
