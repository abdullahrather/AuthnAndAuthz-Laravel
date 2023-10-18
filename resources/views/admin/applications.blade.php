@extends('admin.layouts.main')
@push('title')
    <title>Laravel | Applications</title>
@endpush
@section('admin-main-section')
    <form action="{{ $url }}" method="post">
        @csrf
        <div class="container">
            <div class="section-title">
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="title">Application Title</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Enter Title"
                        value="{{ trim($application->title) ?: old('title') }}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="hei_id">Group</label>
                        <select name="hei_id" id="hei_id" class="form-control">
                            <option value="">Select Group</option>
                            @foreach ($heis as $hei)
                                <option value="{{ $hei->id }}"
                                    {{ $application->hei_id == $hei->id || old('hei_id') == $hei->id ? 'selected' : '' }}>
                                    {{ $hei->title }}
                                </option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('hei_id')
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
