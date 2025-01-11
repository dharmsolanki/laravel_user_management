@extends('layouts.dashboard-layout')

@section('content')
    <main class="main-content">
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow-lg">
                        <div class="card-header text-center">
                            <h4 class="card-title">
                                {{ isset($role) ? 'Edit Role' : 'Create Role' }}
                            </h4>
                            <p class="mb-0">
                                {{ isset($role) ? 'Update the details of the role below' : 'Fill out the form below to create a new role' }}
                            </p>
                        </div>
                        <div class="card-body">
                            @if (session('alert-class') && session('alert-message'))
                                <div class="alert {{ session('alert-class') }} alert-dismissible fade show p-2" role="alert">
                                    {{ session('alert-message') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <!-- Form -->
                            <form method="POST"
                                  action="{{ isset($role) ? route('roles.edit', $role->id) : route('roles.create') }}">
                                @csrf
                                @if(isset($role))
                                    @method('PUT') <!-- Use PUT for updating -->
                                @endif

                                <!-- Role Name Field -->
                                <div class="mb-4">
                                    <label for="name" class="form-label">Role Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Enter the role name"
                                           value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                                    @error('name')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Status Dropdown -->
                                <div class="mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="status" name="status" required>
                                        <option value="" disabled {{ !isset($role) ? 'selected' : '' }}>Select status</option>
                                        <option value="{{ \App\Models\Role::ACTIVE_ROLE }}"
                                            {{ old('status', isset($role) ? $role->status : '') == \App\Models\Role::ACTIVE_ROLE ? 'selected' : '' }}>
                                            Active
                                        </option>
                                        <option value="{{ \App\Models\Role::INACTIVE_ROLE }}"
                                            {{ old('status', isset($role) ? $role->status : '') == \App\Models\Role::INACTIVE_ROLE ? 'selected' : '' }}>
                                            Inactive
                                        </option>
                                    </select>
                                    @error('status')
                                        <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="mb-3 text-center">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        {{ isset($role) ? 'Update Role' : 'Create Role' }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
