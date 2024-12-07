<?php

namespace App\Http\Controllers;

use App\Models\Mandal_wise_user;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Mandal_master;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class MandalController extends Controller
{
    public function index()
    {
        return view('mandal.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'installment_amount' => 'required',
            'interest_rate' => 'required',
        ])->validate();

        print_r($request->all());
        $mandal = new Mandal_master;
        $mandal->mandal_name = $request->name;
        $mandal->installment_amount = $request->installment_amount;
        $mandal->interest_rate = $request->interest_rate . '%';
        $mandal->tenert = $request->tenert;

        $image = $request->file('logo');
        $imagename = $image->getClientOriginalName();
        $imagepath = 'public/imageuploaded/';
        $image->move($imagepath, $imagename);

        $mandal->logo = $imagename;
        // $mandaluser->mandal_id = $request->id;

        $mandal->unique_code = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4)) . rand(1000, 9999);
        $mandal->status = 1;
        $mandal->save();

        $mandaluser=new Mandal_wise_user;
        $mandaluser->user_id = Auth::id();
        $mandaluser->mandal_id = $mandal->id;
        $mandaluser->user_role = 'manager';
        $mandaluser->default_manager = 0;
        $mandaluser->save();

        // $mandaluser->mandal_id = $request->id;
        return redirect()->route('dashboard');
    }
    public function mandaldetails(Request $request)
    {
        // if($request->ajax()){
        //     $details = Mandal_wise_user::where('mandal_id', $request->id)
        //         ->leftJoin('users', 'mandal_wise_user.user_id', '=', 'users.id')
        //         ->select('mandal_wise_user.*', '    .*')
        //         ->get();
    
        //     $sortedDetails = $details->sortBy(function ($user) {
        //         return $user->user_role === 'manager' ? 0 : 1;
        //     })->values();
        //     foreach($details as $key =>$value){
        //         $detailscount[$key]= $details->count(); 
        //     }
        
        //     $mandal=Mandal_master::where('id', $request->id)->first(); 
        //     return response()->json([
        //         'details' => $details,
        //         'count' => $detailscount,
        //         'mandal' => $mandal,
        //     ]);
        // }else{
            // print_r($request->id);die;
        $mandal = Mandal_master::find($request->id);
        $member = Mandal_wise_user::where('mandal_id', $request->id)
            ->leftJoin('users', 'mandal_wise_user.user_id', '=', 'users.id')
            ->select('mandal_wise_user.*', 'users.*')
            ->get()
            ->sortBy(function ($user) {
                return $user->user_role === 'manager' ? 0 : 1;
            });
        $memberUserIds = $member->pluck('user_id');
        $user = User::whereNotIn('id', $memberUserIds)->get();
        $role = $member->firstWhere('user_id', Auth::id()); 
        // print_r($role);die;
        return view('mandal.details', compact('mandal', 'member', 'user','role'));
        // }

    }
}
