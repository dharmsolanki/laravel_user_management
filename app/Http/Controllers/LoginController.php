<?php

namespace App\Http\Controllers;

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
                Auth::login($user);
                return redirect()->route('dashboard');
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
