<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Mandal_wise_user;


class MandalWiseUserController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'mandalid' => 'required',
            'userid' => 'required',
            'role' => 'required',
        ]);

        print_r($request->all());
        $mandal = new Mandal_wise_user;
        $mandal->user_id = $request->userid;
        $mandal->mandal_id = $request->mandalid;
        $mandal->user_role = $request->role;
        $mandal->default_manager =$request->manager== 'on' ? 1 : 0;
        $mandal->save();
        
    }
}
