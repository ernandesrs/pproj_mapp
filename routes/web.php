<?php

use App\Livewire\Admin\Home as AdminHome;
use App\Livewire\Admin\Page as AdminPage;
use App\Livewire\Admin\PageList as AdminPageList;

use App\Livewire\Dash\Home as DashHome;

use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'admin'
], function () {

    Route::get('', AdminHome::class)->name('admin.home');
    Route::get('/page', AdminPage::class)->name('admin.page');
    Route::get('/page-list', AdminPageList::class)->name('admin.pageList');

    /**
     *
     *
     * USERS
     *
     *
     */
    Route::group(['prefix' => 'users'], function () {

        Route::get('/', \App\Livewire\Admin\Users\Index::class)->name('admin.users.index');
        Route::get('create', \App\Livewire\Admin\Users\Create::class)->name('admin.users.create');
        Route::get('{user}/edit', \App\Livewire\Admin\Users\Edit::class)->name('admin.users.edit');

    });

});

Route::group([
    'prefix' => 'dash'
], function () {

    Route::get('', DashHome::class)->name('dash.home');

});
