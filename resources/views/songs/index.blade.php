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
                    <td class="d-flex justify-content-evenly">
                        <a href="{{ route('songs.show', $song) }}"><i class="bi bi-arrow-up-right-square"></i></a>
                        <a href="{{ route('songs.edit', $song) }}"><i class="bi bi-pencil"></i></a>
                        <button class="bi bi-trash3 text-danger delete-icon" data-bs-toggle="modal"
                            data-bs-target="#deleteModal-{{ $song->id }}">
                        </button>

                        @section('modal')
                            <!-- Modal -->
                            @foreach ($songs as $song)
                                <div class="modal fade" id="deleteModal-{{ $song->id }}" tabindex="-1"
                                    aria-labelledby="deleteModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">DELETE SONG!
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure? <br>
                                                The action is irreversible.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('songs.destroy', $song) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endsection
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
