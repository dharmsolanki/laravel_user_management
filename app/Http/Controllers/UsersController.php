<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User; // Ensure you import the User model
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index()
    {
        // Count the total number of users
        $userCount = User::where('users.id', '<>', 1)->count();
        $roleCount = Role::count();

        // Pass the count to the view
        return view('dashboard', [
            'userCount' => $userCount,
            'roleCount' => $roleCount
        ]);
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

    public function userList()
    {
        $users = User::where('users.id', '<>', 1)
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')  // Get all columns from users and the 'name' column from roles
            ->get();

        return view('user-list', [
            'users' => $users,
        ]);
    }

    public function edit(Request $request, $id)
    {
        // Find the user by ID
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found!');
        }

        if ($request->isMethod('post')) {
            // Validate incoming data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id, // Ensure email is unique except for the current user
            ]);

            $user->update($validatedData);

            return redirect()->route('user.list')->with('success', 'User updated successfully!');
        }

        // Render the view with the user data
        return view('user-update', [
            'user' => $user,
        ]);
    }
}
