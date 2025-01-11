<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post'))
        {
            $request->validate([
                'email' => 'required | email',
                'psw' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();
            if ($user && Hash::check($request->psw, $user->password)) {
                if($user->status == Role::ACTIVE_USER){
                    Auth::login($user);
                    return redirect()->route('dashboard')->with('user', Auth::user());
                }
                else{
                    return back()->withErrors(['email' => 'Your account is inactive. Please contact support.']);
                }
            }
    
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }


        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
