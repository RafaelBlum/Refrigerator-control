<?php

use App\Http\Controllers\Frontend\QrCodeController;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    $panelID = Filament\Facades\Filament::getPanel()->getId();

    return to_route("filament.{$panelID}.pages.dashboard");
})->name('frontend.home');


Route::get('/qr-code', QrCodeController::class)->name('frontend.qrcode');


Route::fallback(function (){
   return redirect('/app');
});
