<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/index');
    }

    public function login()
    {
        return view('admin/login'); 
    }

    public function check_login(Request $req)
    {
       $form_data = $req->only('email','password');
       $check = Auth::attempt($form_data, $req->has('remember'));

       if ($check) {
            return redirect()->route('admin.index');
       }

       return redirect()->back()->with('no', 'Mật khẩu bạn nhập không đúng');

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }



    
}
