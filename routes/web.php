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

Route::get('/play', function (){
//    //OneToOne
//    $user = User::find(22);
//    $UserCustomer = User::find(22)->customer;
//    $customer = Customer::find(1);
//
//    //HasMany
//    $transactions = Product::find(2)->transactions;
//    $transaction = \App\Models\ProductTransaction::find(8);
//    dd("Usuário : " . $user->id, "Meu cliente : " . $UserCustomer->id, $customer);
//    for ($i=0; $i< $transactions->count(); $i++)
//    {
//        echo $transactions[$i]->description . "<br/>";
//    }
//
//    $orders = Customer::find(24)->orders;
//
//    dd($orders);

//    TESTE: API ASAAS
    $customers = (new App\Services\AsaasPhp\Customer\CustomerList)->handle();
    dd($customers);



});

Route::get('/', function () {
    $panelID = Filament\Facades\Filament::getPanel()->getId();

    return to_route("filament.{$panelID}.pages.dashboard");
})->name('frontend.home');


Route::get('/qr-code', QrCodeController::class)->name('frontend.qrcode');


Route::fallback(function (){
   return redirect('/app');
});
