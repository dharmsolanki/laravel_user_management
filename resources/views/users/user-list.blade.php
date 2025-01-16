@extends('layouts.dashboard-layout')

@section('content')
<main class="main-content">
    <div class="container mt-4">
        <h2>User Listing</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
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
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                
                                <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger btn-sm" title="Soft Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                                
                                <a href="javascript:void(0);" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $user->id }})" title="Permanent Delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                                
                                @if ($user && $user->trashed())
                                    <a href="{{ route('user.restore', $user->id) }}" class="btn btn-primary btn-sm" title="Restore">
                                        <i class="fas fa-undo"></i>
                                    </a>
                                @endif
                                
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
@section('customJs')
<script>
    function confirmDelete(userId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to the delete route
                window.location.href = '{{ route("user.delete-permanent", ":id") }}'.replace(':id', userId);
            }
        });
    }
</script>
@endsection
