<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MandalController extends Controller
{
    public function index(){
        return view('mandal.create');
    }
}
