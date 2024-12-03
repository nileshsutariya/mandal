<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\Mandal_wise_user;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.header', function ($view) {
            $user = Auth::user();
            $mandal=Mandal_wise_user::where('user_id', Auth::id())
            ->leftJoin('mandal_master', 'mandal_wise_user.mandal_id', '=', 'mandal_master.id')
            ->select('mandal_wise_user.*','mandal_master.*')
            ->get();
            $view->with([
                'user' => $user,
                'mandals' => $mandal
            ]);
        });
        View::composer('layouts.mandalheader', function ($view) {
            $user = Auth::user();
            $mandal=Mandal_wise_user::where('user_id', Auth::id())
            ->leftJoin('mandal_master', 'mandal_wise_user.mandal_id', '=', 'mandal_master.id')
            ->select('mandal_wise_user.*', 'mandal_master.*')
            ->get();
            $view->with([
                'user' => $user,
                'mandals' => $mandal
            ]);
        });
    }
}
