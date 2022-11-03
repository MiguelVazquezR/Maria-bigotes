<?php

use App\Http\Livewire\OrderNow;
use App\Http\Livewire\Main\Index;
use App\Http\Livewire\Menu\Menu;
use App\Http\Livewire\Rate\CreateRate;
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
