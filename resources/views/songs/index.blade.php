@extends('layouts.app')

@section('title', 'Songs list')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Album</th>
                <th scope="col">Details</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($songs as $song)
                <tr>
                    <td>{{ $song->id }}</td>
                    <td>{{ $song->title }}</td>
                    <td>{{ $song->author }}</td>
                    <td>{{ $song->album }}</td>
                    <td><a href="{{ route('songs.show', $song) }}">More details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
