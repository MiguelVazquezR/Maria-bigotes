<?php

use App\Http\Controllers\MBEventController;
use App\Http\Controllers\PaymentController;
use App\Http\Livewire\Admin\Login;
use App\Http\Livewire\Cart\EditCart;
use App\Http\Livewire\Cart\ShowCart;
use App\Http\Livewire\Contact\ContactUs;
use App\Http\Livewire\Events\AdminCalendar;
use App\Http\Livewire\Events\GuestCalendar;
use App\Http\Livewire\OrderNow\OrderNow;
use App\Http\Livewire\Main\Index;
use App\Http\Livewire\Menu\Admin\CreateMenu;
use App\Http\Livewire\Menu\Admin\EditMenu;
use App\Http\Livewire\Menu\Admin\IndexMenu;
use App\Http\Livewire\Menu\Menu;
use App\Http\Livewire\Rate\CreateRate;
use App\Http\Livewire\OrderNow\SelectedProduct;
use App\Http\Livewire\Payment\Pay;
use App\Http\Livewire\Promo\Admin\CreatePromo;
use App\Http\Livewire\Promo\Admin\EditPromo;
use App\Http\Livewire\Promo\Admin\IndexPromo;
use App\Http\Livewire\Promo\Promos;
use App\Http\Livewire\Qr\QrCode;
use App\Http\Livewire\Rate\Admin\IndexRate;
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
Route::get('/selected-product/{product}', SelectedProduct::class)->name('selected-product');
Route::get('/promos', Promos::class)->name('promos');
Route::get('/contact', ContactUs::class)->name('contact');
Route::get('/qr', QrCode::class)->name('qr');
Route::get('/my-cart', ShowCart::class)->name('cart.show');
Route::get('/my-cart/{index}/edit', EditCart::class)->name('cart.edit');
Route::get('/payment', Pay::class)->name('pay');

Route::get('/menu/admin', IndexMenu::class)->middleware('auth')->name('menu.admin.index');
Route::get('/menu/admin/create', CreateMenu::class)->middleware('auth')->name('menu.admin.create');
Route::get('/menu/admin/{product}/edit', EditMenu::class)->middleware('auth')->name('menu.admin.edit');

Route::get('/promos/admin', IndexPromo::class)->middleware('auth')->name('promo.admin.index');
Route::get('/promos/admin/create', CreatePromo::class)->middleware('auth')->name('promo.admin.create');
Route::get('/promos/admin/{promo}/edit', EditPromo::class)->middleware('auth')->name('promo.admin.edit');

Route::get('/rates/admin', IndexRate::class)->middleware('auth')->name('rate.admin.index');

Route::post('/process-payment', [PaymentController::class, 'processPay']);
Route::get('/payment-error', [PaymentController::class, 'error'])->name('payment.error');
Route::get('/payment-success/{order}', [PaymentController::class, 'success'])->name('payment.success');

Route::resource('/events', MBEventController::class);
// Route::get('/all-events', [MBEventController::class, 'showAll']);

Route::get('/calendar', GuestCalendar::class)->name('calendar.guest');
Route::get('/admin-calendar', AdminCalendar::class)->middleware('auth')->name('calendar.admin');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
