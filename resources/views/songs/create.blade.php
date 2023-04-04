@extends('layouts.app')

@section('title', 'Add new song')

@section('content')
    <form action="{{ route('songs.store') }}" method="POST" class="row gy-5">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="col-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>

        <div class="col-4">
            <label for="album" class="form-label">Album</label>
            <input type="text" class="form-control" name="album" id="album" value="{{ old('album') }}">
        </div>

        <div class="col-4">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
        </div>

        <div class="col-4">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control" name="editor" id="editor" value="{{ old('editor') }}">
        </div>

        <div class="col-4">
            <label for="length" class="form-label">Length</label>
            <input type="time" class="form-control" name="length" id="length" value="{{ old('length') }}">
        </div>

        <div class="col-4">
            <label for="poster" class="form-label">URL Poster</label>
            <textarea type="text" class="form-control" name="poster" id="poster"></textarea>
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
