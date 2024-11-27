<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Mandal_master;

use Illuminate\Support\Facades\Auth;
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
            'mobile' => 'required|unique:users,mobile',
            'password' => 'required',
            'confirmpassword' => 'required|same:password',
        ])->validate();

        print_r($request->all());
        $user = new User;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        $user->mobile = $request->mobile;
        $user->status = 1;
        $user->save();
        $url = $request->url();
        if (strpos($url, 'api') == true) {
            return response()->json("register successfully.");
        } else {
            return redirect()->route('login');
        }
    }
    public function edit()
    {
        $user = User::find(Auth::id());
        return view('user.profile', compact('user'));
    }
    public function update(Request $request)
    {
        if (isset($request['password']) && $request['password'] != "") {
            $request->validate([
                'confirmpassword' => 'required|same:password'
            ]);
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,' . $request->id,
        ])->validate();

        print_r($request->all());
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->date_of_birth = $request->dob;
        $user->gender = $request->gender;
        $user->address = $request->address;
        $user->pancard_no = $request->pancard;
        $user->adharcard_no = $request->adharcard;
        $user->mobile = $request->mobile;
        $password = $request->password;
        if (isset($password)) {
            $user->password = Hash::make($request->password);
        }
        $image = $request->file('image');
        if ($image) {
            $imagename = $image->getClientOriginalName();
            $imagepath = 'public/imageuploaded/';
            $image->move($imagepath, $imagename);

            $user->image = $imagename;
        }
        $user->status = 1;
        $user->save();
        $url = $request->url();
        return redirect()->route('user.edit');
    }

}
