@extends('admin.layouts.main')
@push('title')
    <title>NTC | Users List</title>
@endpush
@section('admin-main-section')
    <div class="container" data-aos="fade-up">
        <div class="row content">
            <form action="">
                <div class="form-group row">
                    <div class="col-md-12">
                        <div class="input-group">
                            <input type="search" name="search" id="" class="form-control" placeholder="Search here"
                                value="{{ $search }}">
                            <button class="btn btn-primary"><i class="fa fa-search"></i>Search</button>
                            <a href="{{ url('/user/view') }}">
                                <button class="btn btn-primary" type="button"><i class="fa fa-reset"></i>Reset</button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="button-container">
                <a href="{{ route('user.create') }}">
                    <button class="btn btn-primary d-inline-block m-2">Add User</button>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{ $i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->user_role->role }}</td>
                                <td>
                                    <div class="button-container">
                                        <a href="{{ route('user.delete', ['id' => $user->id]) }}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                        <a href="{{ route('user.edit', ['id' => $user->id]) }}">
                                            <button class="btn btn-secondary">Edit</button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="pagination justify-content-center">
                        {{ $users->links() }}
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
