@extends('layouts.app')

@section('title', 'Edit song data: "' . $song->title . '"')

@section('content')
    <form action="{{ route('songs.update', $song) }}" method="POST" class="row gy-5">
        @csrf
        @method('PUT')

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

        <div class="col-4">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                value="{{ old('title') ?? $song->title }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="album" class="form-label">Album</label>
            <input type="text" class="form-control @error('album') is-invalid @enderror" name="album" id="album"
                value="{{ old('album') ?? $song->album }}">
            @error('album')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control @error('author') is-invalid @enderror" name="author" id="author"
                value="{{ old('author') ?? $song->author }}">
            @error('author')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="editor" class="form-label">Editor</label>
            <input type="text" class="form-control @error('editor') is-invalid @enderror" name="editor" id="editor"
                value="{{ old('editor') ?? $song->editor }}">
            @error('editor')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="length" class="form-label">Length</label>
            <input type="time" class="form-control @error('length') is-invalid @enderror" name="length" id="length"
                value="{{ old('length') ?? $song->length }}">
            @error('length')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="col-4">
            <label for="poster" class="form-label">URL Poster</label>
            <textarea type="text" class="form-control @error('poster') is-invalid @enderror" name="poster" id="poster">{{ old('poster') ?? $song->poster }}</textarea>
            @error('poster')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection
