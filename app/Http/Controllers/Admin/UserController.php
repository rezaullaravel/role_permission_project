<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function usesrs(){
        $users = User::all();
        return view('panel.user.list',compact('users'));
    }
}
