<?php

namespace App\Observers;

use App\Mail\NewCustomerMail;
use App\Models\Customer;
use http\Client\Curl\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Enums\PanelTypeEnum;

class CustomerObserver
{
    /**
     * Description: https://laravel.com/docs/10.x/eloquent#observers
     *  php artisan make:obeserver CustomerObserver --model=Customer
     *  Precisa ativar App\Providers\EventServiceProvider
     */
    /**
     * Handle the Customer "created" event.
     */
    public function created(Customer $customer): void
    {
        $secret = Str::random(8);

        $user = \App\Models\User::create([
            'name' => $customer->name,
            'panel' => PanelTypeEnum::APP,
            'email' => $customer->email,
            'password' => bcrypt($secret),
        ]);

        $customer->user_id = $user->id;

        /**
         * pt-br: Salva sem chamar eventos
        */
        $customer->saveQuietly();

        Mail::to($customer->email)->send(new NewCustomerMail($customer, $secret));
    }

    /**
     * Handle the Customer "updated" event.
     */
    public function updated(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "deleted" event.
     */
    public function deleted(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "restored" event.
     */
    public function restored(Customer $customer): void
    {
        //
    }

    /**
     * Handle the Customer "force deleted" event.
     */
    public function forceDeleted(Customer $customer): void
    {
        //
    }
}
