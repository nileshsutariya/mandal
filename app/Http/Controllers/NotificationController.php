<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index(){
        $notification = Notification::where('receiver_id', Auth::id())
        ->leftJoin('mandal_master', 'mandal_master.id', '=', 'notification.mandal_id')
        ->leftJoin('users as sender', 'sender.id', '=', 'notification.sender_id')
        ->leftJoin('users as receiver', 'receiver.id', '=', 'notification.receiver_id')
        ->select('notification.*', 'mandal_master.mandal_name as mandal_name', 'mandal_master.logo as logo', 'sender.name as sender_name', 'sender.id as sender_id', 'receiver.name as receiver_name', 'receiver.id as receiver_id')
        ->orderBy('notification.created_at', 'desc') 
        ->get();
        return view('User.notification', compact('notification'));
    }
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mandalid' => 'required|integer',
            'userid' => 'required|integer',
            'role' => 'required|string',
        ])->validate();

        $notification = new Notification();
        $notification->receiver_id = $request->userid;
        $notification->sender_id = Auth::id();
        $notification->mandal_id = $request->mandalid;
        $notification->user_role = $request->role;
        if ($notification->user_role == "member") {
            $notification->default_manager = $request->manager == 'on' ? 1 : 0;
        } elseif ($notification->user_role == "manager") {
            $notification->default_manager = 0;
        }
        // print_r($notification);die;
        $notification->save();
        return response()->json('send notification');

    }
}
