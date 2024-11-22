<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $user = User::find(Auth::id());
        return view('dashboard' ,compact('user'));
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');

    }
}



