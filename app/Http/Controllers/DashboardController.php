<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Ensure you import the User model

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
        if($request->isMethod('post'))
        {
            $data = $request->all();
            echo '<pre>'; print_r($data);exit();
        }
        return view('user-create');
    }
}
