<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\Mandal_master;
use App\Models\Mandal_wise_user;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
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
    public function dashboard()
    {
        $mandals = Mandal_wise_user::where('user_id', Auth::id())
            ->leftJoin('mandal_master', 'mandal_wise_user.mandal_id', '=', 'mandal_master.id')
            ->select('mandal_wise_user.*', 'mandal_master.*')
            ->get();
        $count = "";
        foreach ($mandals as $key => $mandal) {
            $mandalcount = Mandal_wise_user::where('mandal_id', $mandal->id)
                ->leftJoin('users', 'mandal_wise_user.user_id', '=', 'users.id')
                ->select('mandal_wise_user.*', 'users.*')
                ->get();
            $count[$key] = $mandalcount->count();
            // print_r($count[$key]);
            // print_r('<br>');
        }
        $user = Auth::user();
        return view('dashboard', compact('mandals', 'user', 'count'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function switchaccount(Request $request)
    {
        $mandal = Mandal_master::find($request->id);
        $mandals = Mandal_wise_user::where('user_id', Auth::id())
            ->leftJoin('mandal_master', 'mandal_wise_user.mandal_id', '=', 'mandal_master.id')
            ->select('mandal_wise_user.*', 'mandal_master.*')
            ->get();
        $member = Mandal_wise_user::where('mandal_id', $request->id)
            ->leftJoin('users', 'mandal_wise_user.user_id', '=', 'users.id')
            ->select('mandal_wise_user.*', 'users.*')
            ->get()
            ->sortBy(function ($user) {
                return $user->user_role === 'manager' ? 0 : 1;
            });
        $membercount = $member->count();
        // print_r($member);die;
        $memberUserIds = $member->pluck('user_id');
        $user = User::whereNotIn('id', $memberUserIds)->get();
        $role = $member->firstWhere('user_id', Auth::id());

        return view('mandaldashboard', compact('mandals', 'mandal', 'member', 'role', 'user', 'membercount'));
    }
}



