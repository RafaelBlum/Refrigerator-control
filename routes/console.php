<?php

declare(strict_types=1);

use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductTransaction;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;

Artisan::command('play', function () {
    $customers = (new App\Services\AsaasPhp\Customer\CustomerList)->handle();
    dd($customers);
});

Artisan::command('relationship', function () {
    //OneToOne
    $user = User::find(22);
    $UserCustomer = User::find(22)->customer;
    $customer = Customer::find(1);

    //HasMany
    $transactions = Product::find(2)->transactions;
    $transaction = ProductTransaction::find(8);
    dd("Usuário : " . $user->id, "Meu cliente : " . $UserCustomer->id, $customer);
    for ($i = 0; $i < $transactions->count(); $i++) {
        echo $transactions[$i]->description . "<br/>";
    }

    $orders = Customer::find(24)->orders;

    dd($orders);
});
