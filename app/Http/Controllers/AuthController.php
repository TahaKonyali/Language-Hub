<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(){
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password'=> $request->password, 'status' => 'active'])) {
            $message = 'Welcome back, ' . Auth::user()->name . '! You have successfully logged in.';
            
            return redirect()->route('dashboard')->withErrors(['success' => $message]);

        }
        return redirect()->back()->withErrors(['danger' => "Invalid Credentials"])->withInput($request->input());
    }

    public function register(){
        
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8|confirmed'
        ]);
        try {

            DB::beginTransaction();

            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            // $data = [
            //     'email' => $user->email,
            //     'name' => $user->name,
            // ];
            // Mail::send('email.register', $data , function($message) use ($data) {
            //     $message->to($data['email'], $data['name'])->subject('Welcome to Oxford Studios');
            //     $message->from(env('MAIL_FROM_ADDRESS'),env('MAIL_FROM_NAME'));
            // });

            Auth::attempt(['email' => $request->email, 'password'=> $request->password]);

            DB::commit();

            return redirect()->route('dashboard')->withErrors(['success' => 'Registration successful!.']);
            
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['danger' => $e->getMessage()])->withInput($request->input());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->withErrors(['danger' => 'Logout successful!']);
    }
}
