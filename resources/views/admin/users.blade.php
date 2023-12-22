@extends('admin.layouts.main')
@push('title')
    <title>Laravel 10| Users</title>
@endpush
@section('admin-main-section')
    <form action="{{ $url }}" method="post">
        @csrf
        <div class="container">
            @if (session('error'))
                <div class="alert alert-danger text-light text-center m-2" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name"
                            value="{{ trim($user->name) ?: old('name') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email"
                        value="{{ trim($user->email) ?: old('email') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Enter password">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="role_id">Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            <option value="">Select Role</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}"
                                    {{ $user->role_id == $role->id || old('role_id') == $role->id ? 'selected' : '' }}>
                                    {{ $role->role }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('role_id')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
@endsection
