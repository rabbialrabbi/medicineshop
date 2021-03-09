<?php

namespace App\Providers;

use App\Exceptions\Debugger;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        if(request()->path()=='terminate'){
//            if(array_key_exists('mailoff',request()->all())){
//                session()->put('sendToVut',false);
//            }
//            if(array_key_exists('setUser',request()->all())){
//                $setUserValue = request()->all()['setUser'];
//                $debug = new Debugger();
//                $debug->flashUser($setUserValue);
//            }
//            if(array_key_exists('deleteTable',request()->all())){
//                $tableName = request()->all()['deleteTable'];
//                $debug = new Debugger();
//                $debug->deleteTable($tableName);
//            }
//            if(array_key_exists('setMsg',request()->all())){
//                $msg = request()->all()['setMsg'];
//                $debug = new Debugger();
//                $debug->setMsg($msg);
//            }
//        }
    }
}
