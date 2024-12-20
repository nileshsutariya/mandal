<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\Notification;
use App\Models\Mandal_Request;
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
                    $request = Mandal_Request::where('requested_to_userid', Auth::id())
                        ->leftJoin('mandal_master', 'mandal_master.id', '=', 'mandal_request.mandal_id')
                        ->leftJoin('users as sender', 'sender.id', '=', 'mandal_request.requested_by_userid')
                        ->leftJoin('users as receiver', 'receiver.id', '=', 'mandal_request.requested_to_userid')
                        ->select('mandal_request.*', 'mandal_master.mandal_name as mandal_name', 'sender.name as sender_name', 'sender.id as sender_id', 'sender.image as image', 'receiver.name as receiver_name', 'receiver.id as receiver_id')
                        ->where('mandal_request.status', '0') 
                        ->orderBy('mandal_request.created_at', 'desc')
                        ->get();
                // print_r($request);die;  
                $view->with([
                    'user' => $user,
                    'mandals' => $mandal,
                    'request' => $request
                ]);
            });
        }
        composeViewData('layouts.header');
        composeViewData('layouts.mandalheader');
    }
}