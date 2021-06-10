<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class AdminController extends Controller
{
    public function loginPost(Request $request){
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard', ['user' => $admin]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function statistics()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.statistics', ['user' => $admin]);
    }
}
