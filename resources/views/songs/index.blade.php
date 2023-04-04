@extends('layouts.app')

@section('cdn')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
@endsection

@section('title', 'Songs list')

@section('content')
    <div class="row my-4">
        <div class="col">
            <form class="d-flex" role="search">
                <input class="form-control me-2" name="term" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" type="submit">Search</button>
            </form>
        </div>
        <div class="col">
            <a href="{{ route('songs.create') }}" class="btn btn-primary ms-5">Add song</a>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Album</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($songs as $song)
                <tr>
                    <td>{{ $song->id }}</td>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->author }}</td>
                    <td>{{ $song->album }}</td>
                    <td>
                        <a href="{{ route('songs.show', $song) }}"><i class="bi bi-arrow-up-right-square"></i></a>
                        <a href="{{ route('songs.edit', $song) }}"><i class="bi bi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
