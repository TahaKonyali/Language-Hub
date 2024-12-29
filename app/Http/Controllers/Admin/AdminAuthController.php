<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('admin')->user()) {
            return redirect()->route('admin.main');
        }
        return view('admin.auth.login');
    }

    public function loginProcess(Request $request)
    {
        $attempt = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($attempt)) {
            if (Auth()->check()) {
                return redirect()->route('admin.main');
            } else {
                return redirect()->back()->withErrors(['danger' => "Permission Denied"]);
            }
        }
        return back()->withErrors(['danger' => "Invalid Credentials"]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('admin.login');
    }
}
