<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mandal_wise_user;


class MandalWiseUserController extends Controller
{
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'mandalid' => 'required|integer',
            'userid' => 'required|integer',
            'role' => 'required|string',
        ])->validate();

        $mandal = new Mandal_wise_user;
        $mandal->user_id = $request->userid;
        $mandal->mandal_id = $request->mandalid;
        $mandal->user_role = $request->role;
        if ($mandal->user_role == "member") {
            $mandal->default_manager = $request->manager == 'on' ? 1 : 0;
        } elseif ($mandal->user_role == "manager") {
            $mandal->default_manager = 0;
        }
        // print_r($mandal);die;
        $mandal->save();

        $member = Mandal_wise_user::where('mandal_id', $request->mandalid)
            ->leftJoin('users', 'mandal_wise_user.user_id', '=', 'users.id')
            ->select('mandal_wise_user.user_role as role', 'users.*')
            ->get();
        return response()->json($member);

    }
}
