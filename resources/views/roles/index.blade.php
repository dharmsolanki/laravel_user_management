@extends('layouts.dashboard-layout')

@section('content')
<main class="main-content">
    <div class="container mt-4">
        <h2>Role Listing</h2>
        @if (session('alert-message'))
        <div class="alert {{ session('alert-class') }} alert-dismissible fade show" role="alert">
            {{ session('alert-message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
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
                @if (count($roles) > 0)
                    
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
                @else
                    <tr>
                        <td colspan="4" class="text-center">No Records Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</main>
@endsection
