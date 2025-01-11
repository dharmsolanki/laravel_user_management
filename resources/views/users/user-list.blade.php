@extends('layouts.dashboard-layout')

@section('content')
<main class="main-content">
    <div class="container mt-4">
        <h2>User Listing</h2>
        <!-- Table -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                    @foreach($users as $id => $user)
                        <tr>
                            <td>{{ $id + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role_name }}</td>
                            <td>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
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
