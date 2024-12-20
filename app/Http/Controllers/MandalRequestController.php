<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Mandal_Request;
use App\Models\Mandal_wise_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MandalRequestController extends Controller
{
    public function memberlist(Request $request)
    {
        $search = $request->search;
        // print_r($search);die;
        $mandalid = $request->mandalid;

        $member = User::where('mobile', 'like', '%' . $search . '%')->get();

        $wiseData = [];
        $sendRequestData = [];

        $search = $request->search;
        $mandalid = $request->mandalid;

        $member = User::where('mobile', 'like', '%' . $search . '%')
            ->orWhere('name', 'like', '%' . $search . '%')
            ->get();

        $userIds = $member->pluck('id')->toArray();

        $wiseData = Mandal_wise_user::whereIn('user_id', $userIds)
            ->where('mandal_id', $mandalid)
            ->leftJoin('users', 'users.id', '=', 'mandal_wise_user.user_id')
            ->get();

        $sendRequestData = Mandal_Request::whereIn('requested_to_userid', $userIds)
            ->where('mandal_id', $mandalid)
            ->where('status', '0')
            ->get();

        return response()->json([
            'member' => $member,
            'wise' => $wiseData,
            'sendrequest' => $sendRequestData,
        ]);
    }

    public function sendrequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
            'mandalid' => 'required|integer',
        ])->validate();

        $mandal_request = new Mandal_Request();
        $mandal_request->mandal_id = $request->mandalid;
        $mandal_request->requested_to_userid = $request->id;
        $mandal_request->requested_by_userid = Auth::id();

        // print_r($mandal_request);die;
        $mandal_request->save();

        return redirect()->route('memberlist', ['search' => $request->search, 'mandalid' => $request->mandalid]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer',
        ])->validate();
        $notification = Mandal_request::find($request->id);
        if ($notification) {
            if ($request->data == 'accept') {git
                $mandal = new Mandal_wise_user();
                $mandal->mandal_id = $notification->mandal_id;
                $mandal->user_id = Auth::id();
                $mandal->user_role = 'member';
                $mandal->default_manager = 0;
                $mandal->save();
                $notification->status = 2;
                $notification->save();
            }

            if ($request->data == 'decline') {
                $notification->status = 3;
                $notification->save();
            }
        }

        // return response()->json('a/d');
    }
}