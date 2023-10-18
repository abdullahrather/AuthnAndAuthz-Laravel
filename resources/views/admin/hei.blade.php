@extends('admin.layouts.main')
@push('title')
    <title>Laravel | Group Register</title>
@endpush
@section('admin-main-section')
    <form action="{{ $url }}" method="post">
        @csrf
        <div class="container">
            <div class="section-title">
            </div>
            <div class="form-group">
                <label for="title">Group Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter Group Name"
                value="{{ trim($hei->title) ?: old('title') }}">
            </div>
            <button class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
@endsection
