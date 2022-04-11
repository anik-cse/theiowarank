<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CkeditorImageController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Guest\SliderDetailController;
use App\Http\Livewire\Admin\Events\EventList;
use App\Http\Livewire\Admin\Events\EventCreate;
use App\Http\Livewire\Admin\Events\EventEdit;
use App\Http\Livewire\Admin\Events\EventShow;
use App\Http\Livewire\Admin\Events\EventTier;
use App\Http\Livewire\Admin\Events\EventType;
use App\Http\Livewire\Admin\Race\RaceLength;
use App\Http\Livewire\Admin\Race\RaceList;
use App\Http\Livewire\Admin\Race\RaceResult;
use App\Http\Livewire\Admin\Race\RaceType;
use App\Http\Livewire\Admin\Riders\RiderCreate;
use App\Http\Livewire\Admin\Riders\RiderDetails;
use App\Http\Livewire\Admin\Riders\RiderEdit;
use App\Http\Livewire\Admin\Riders\RiderList;
use App\Http\Livewire\Admin\Riders\Settings\RiderClass;

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
Route::get('learn-more/{slug}', SliderDetailController::class)->name('guest.slider.details');

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
        Route::get('/event-show/{id}', EventShow::class)->name('events.show');
        Route::get('/event-types', EventType::class)->name('event.types');
        Route::get('/event-tiers', EventTier::class)->name('event.tiers');
        // Riders 
        Route::get('/riders', RiderList::class)->name('riders.list');
        Route::get('/rider-create', RiderCreate::class)->name('riders.create');
        Route::get('/rider-edit/{id}', RiderEdit::class)->name('riders.edit');
        Route::get('/rider-details/{rider}', RiderDetails::class)->name('riders.detail');
        Route::get('/riders/settings/rider-class', RiderClass::class)->name('riders.settings.class');
        // Race 
        Route::get('/race-types', RaceType::class)->name('race.types');
        Route::get('/race-length', RaceLength::class)->name('race.length');
        Route::get('/race-result', RaceResult::class)->name('race.result');
        Route::get('/race-list', RaceList::class)->name('race.list');

        Route::resource('pages', PagesController::class);
        Route::resource('slider', SliderController::class);
        Route::post('/ckeditor-img', [CkeditorImageController::class, 'store'])->name('ckeditor.img.upload');
    });
});