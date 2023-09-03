@extends('admin.layouts.main')
@push('title')
    <title>NTC | HEI List</title>
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
                            <a href="{{ url('/hei/view') }}">
                                <button class="btn btn-primary" type="button"><i class="fa fa-reset"></i>Reset</button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="button-container">
                <a href="{{ route('hei.create') }}">
                    <button class="btn btn-primary d-inline-block m-2">Add Record</button>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">Sr.</th>
                            <th>HEI Title</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($heis as $hei)
                            <tr>
                                <td class="text-center" scope="row">{{ $i }}</td>
                                <td>{{ $hei->title }}</td>
                                <td class="text-center">
                                    <div class="button-container">
                                        <a href="{{ route('hei.edit', ['id' => $hei->id]) }}"><button
                                                class="btn btn-secondary">Edit</button></a>
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
            <div class="row" style="flex: auto">
                <div class="col-md-12 text-center">
                    <ul class="pagination justify-content-center">
                        {{ $heis->links() }}
                    </ul>
                </div>
            </div>

        </div>
    </div>
@endsection
