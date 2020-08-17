<?php

namespace App\Providers;

use App\Channel;
use App\Http\View\Composers\ChannelsComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Billing\BankPaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Billing\CreditPaymentGateway;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function($app) {
          
            if (request()->has('credit')) 
            {
                return new CreditPaymentGateway('usd');
            }
            
            return new BankPaymentGateway('usd');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //option1 - Every single view
        //View::share( 'channels', Channel::orderBy('name')->get() );

        //option2 - Granular views with wildcards
//        View::composer(['post.*', 'channel.index'], function ($view) {
//            $view->with('channels', Channel::orderBy('name')->get());
//        });

//        option3 - Dedicated class
        View::composer('partials.channels.*', ChannelsComposer::class);
//        View::composer(['postpost.*', 'channel.index'], ChannelsComposer::class);
    }
}
