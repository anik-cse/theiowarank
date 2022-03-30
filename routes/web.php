<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CkeditorImageController;
use App\Http\Livewire\Admin\Events\EventList;
use App\Http\Livewire\Admin\Events\EventCreate;
use App\Http\Livewire\Admin\Events\EventEdit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::view('/', 'home');
Route::view('/about', 'about-us')->name('about');

Route::group(['middleware' => 'auth'],function () {
    Route::group(['middleware' => 'role', 'prefix' => 'admin', 'as' => 'admin.'],function () {
        Route::view('/dashboard', 'dashboard')->name('dashboard');
        Route::resource('/settings', SettingController::class)->except([
            'create', 'show', 'edit', 'update', 'destroy'
        ]);
        // Add admin 
        Route::view('/add-user', 'admin.add-user')->name('add.user');
        // Event 
        Route::get('/events', EventList::class)->name('events.list');
        Route::get('/event-create', EventCreate::class)->name('events.create');
        Route::get('/event-edit/{id}', EventEdit::class)->name('events.edit');
        Route::view('/event-types', 'admin.events.event-types')->name('event-types');
        // Riders 
        Route::view('/riders', 'admin.riders')->name('riders');

        Route::view('/race-types', 'admin.race.race-types')->name('race-types');
        Route::view('/race-length', 'admin.race.race-length')->name('race-length');
        Route::view('/race-result', 'admin.race.race-result')->name('race-result');
        Route::resource('pages', PagesController::class);
        Route::post('/ckeditor-img', [CkeditorImageController::class, 'store'])->name('ckeditor.img.upload');
    });
});