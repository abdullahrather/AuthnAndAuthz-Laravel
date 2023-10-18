@extends('admin.layouts.main')
@push('title')
    <title>Laravel | Application List</title>
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
                            <a href="{{ url('/aplication/view') }}">
                                <button class="btn btn-primary" type="button"><i class="fa fa-reset"></i>Reset</button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="button-container">
                @if (Gate::allows('admin-hei'))
                    <a href="{{ route('application.create') }}">
                        <button class="btn btn-primary d-inline-block m-2">Add Application</button>
                    </a>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>Sr.</th>
                            <th>Application Title</th>
                            <th>Group Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($applications as $application)
                            <tr>
                                <td scope="row">{{ $i }}</td>
                                <td>{{ $application->title }}</td>
                                <td>{{ $application->hei->title }}</td>
                                <td>
                                    <div class="button-container">
                                        @if (Gate::allows('admin'))
                                            <a href="{{ route('application.delete', ['id' => $application->id]) }}">
                                                <button class="btn btn-danger">Delete</button>
                                            </a>
                                        @endif
                                        @if (Gate::allows('admin-aic'))
                                            <a href="{{ route('application.edit', ['id' => $application->id]) }}">
                                                <button class="btn btn-secondary">Edit</button>
                                            </a>
                                        @endif
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
                        {{ $applications->links() }}
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
