<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('roles.index',[
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if($request->isMethod('post'))
        {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|integer',
            ]);

            $role = Role::create($validatedData);

            if ($role) {
                session()->flash('alert-class', 'alert-success');
                session()->flash('alert-message', 'Role created successfully!');
            } else {
                session()->flash('alert-class', 'alert-danger');
                session()->flash('alert-message', 'Failed to create Role. Please try again.');
            }
            return redirect()->back();
        }
       return view('roles.form');
    }

    public function edit(Request $request,$id)
    {
        $role = Role::findOrFail($id);
        if ($request->isMethod('PUT')) {
            // Validate the incoming data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'required|integer',
            ]);
    
            // Update the role
            $role->update($validatedData);
    
            // Set a success message
            session()->flash('alert-class', 'alert-success');
            session()->flash('alert-message', 'Role updated successfully!');
    
            // Redirect back to the roles index or wherever you want
            return redirect()->route('roles.index');
        }
        return view('roles.form',[
            'role' => $role
        ]);
    }
}
