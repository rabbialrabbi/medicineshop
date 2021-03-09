<?php

namespace App\Providers;

use App\ItemType;
use App\Message;
use App\Order;
use App\User;
use http\Env\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if(!is_null(User::All()->first)){
            View::share('users', User::where('is_verified',2)->get());
            View::share('pending_order', Order::where('status','Pending')->get());
            View::share('pending_message', Message::where('status','Pending')->get());
            View::share('itemType', ItemType::all());
        }
    }
}
