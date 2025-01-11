@extends('layouts.dashboard-layout')

@section('content')
<main class="main-content">
    <div class="container mt-4">
        <h2>Role Listing</h2>

        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $id => $role)
                    <tr>
                        <td>{{ $id + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->status == 1 ? "Active" : "Inactive"}}</td>
                        <td>
                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
