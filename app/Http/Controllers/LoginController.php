<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Mandal_master;
use App\Models\Mandal_wise_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');                
        }
        return view('login');
    }
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mobile' => 'required|exists:users,mobile',
            'password' => 'required',
        ])->validate();
        $credentials = $request->only('mobile', 'password');
        $mobile = $request->mobile;
        $user = User::where('mobile', $mobile)->first();
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        } else {
            Auth::logout();
            return back()->withInput()->withErrors(['password' => 'Wrong Password',]);
        }
    }
    public function dashboard(){
        $mandals=Mandal_wise_user::where('user_id', Auth::id())
        ->leftJoin('mandal_master', 'mandal_wise_user.mandal_id', '=', 'mandal_master.id')
        ->select('mandal_wise_user.*', 'mandal_master.*') 
        ->get();
        $user = Auth::user();

        return view('dashboard',compact('mandals','user'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function switchaccount(Request $request){
        $id=$request->id;
        $mandal = Mandal_master::find($request->id);
        return view('mandaldashboard',compact('mandal'));

    }
}



