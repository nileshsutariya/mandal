<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function signup()
    {
        return view('registration');
    }
    public function store(Request $request)
    {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'mobile' => 'numeric',
                'password' => 'required',
                'confirmpassword' => 'required|same:password',
            ])->validate();
            
            print_r($request->all());
            $user = new User;
            $user->name = $request['name'];
            $user->password = Hash::make($request['password']);
            $user->mobile = $request['mobile'];
            $user->status = 1;
            $user->save();
            $url=$request->url();
            if (strpos($url, 'api') == true){
                 return response()->json("register successfully.");
             }else{
                return redirect()->route('login');
             }
    }
  
}
