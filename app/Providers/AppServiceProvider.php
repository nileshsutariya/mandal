<?php

namespace App\Providers;

use App\Models\Notification;
use App\Models\Mandal_wise_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
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
        function composeViewData($viewName)
        {
            View::composer($viewName, function ($view) {
                $user = Auth::user();
                $mandal = Mandal_wise_user::where('user_id', Auth::id())
                    ->leftJoin('mandal_master', 'mandal_wise_user.mandal_id', '=', 'mandal_master.id')
                    ->select('mandal_wise_user.*', 'mandal_master.*')
                    ->get();
                $notification = Notification::where('receiver_id', Auth::id())
                    ->leftJoin('mandal_master', 'mandal_master.id', '=', 'notification.mandal_id')
                    ->leftJoin('users as sender', 'sender.id', '=', 'notification.sender_id')
                    ->leftJoin('users as receiver', 'receiver.id', '=', 'notification.receiver_id')
                    ->select('notification.*', 'mandal_master.mandal_name as mandal_name', 'mandal_master.logo as logo', 'sender.name as sender_name', 'sender.id as sender_id', 'receiver.name as receiver_name', 'receiver.id as receiver_id')
                    ->orderBy('notification.created_at', 'desc') 
                    ->take(3)
                    ->get();
                $view->with([
                    'user' => $user,
                    'mandals' => $mandal,
                    'notification' => $notification
                ]);
            });
        }
        composeViewData('layouts.header');
        composeViewData('layouts.mandalheader');
    }
}