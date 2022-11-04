<?php

use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\Contact\ContactUs;
use App\Http\Livewire\OrderNow\OrderNow;
use App\Http\Livewire\Main\Index;
use App\Http\Livewire\Menu\Admin\IndexMenu;
use App\Http\Livewire\Menu\Menu;
use App\Http\Livewire\Rate\CreateRate;
use App\Http\Livewire\OrderNow\SelectedProduct;
use App\Http\Livewire\Promo\Admin\IndexPromo;
use App\Http\Livewire\Promociones\Promos;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/order-now', OrderNow::class)->name('order-now');
Route::get('/menu', Menu::class)->name('menu');
Route::get('/rate', CreateRate::class)->name('rate.create');
Route::get('/selected-product', SelectedProduct::class)->name('selected-product');
Route::get('/promos', Promos::class)->name('promos');
Route::get('/contact', ContactUs::class)->name('contact');

Route::get('/menu/admin', IndexMenu::class)->name('menu.admin.index');
Route::get('/promos/admin', IndexPromo::class)->name('promo.admin.index');
Route::get('/rates/admin', IndexPromo::class)->name('rate.admin.index');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
