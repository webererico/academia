<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeAdminController extends Controller
{
    public function index(){
        $admin = true;
        return view('home', compact('admin'));
    }
}
