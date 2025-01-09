<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Ensure you import the User model
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        // Count the total number of users
        $userCount = User::count();

        // Pass the count to the view
        return view('dashboard', compact('userCount'));
    }

    public function createUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required | email | unique:users,email',
                'password' => 'required | min:8 | confirmed',
            ]);
            // Attempt to save the user
            $user = User::create($validatedData);

            if ($user) {
                session()->flash('alert-class', 'alert-success');
                session()->flash('alert-message', 'User created successfully!');
            } else {
                session()->flash('alert-class', 'alert-danger');
                session()->flash('alert-message', 'Failed to create user. Please try again.');
            }

            return redirect()->back();
        }
        return view('user-create');
    }
}
