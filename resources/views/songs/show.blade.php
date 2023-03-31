@extends('layouts.app')

@section('title', 'Detail Song')

@section('content')
    <div class="row">
        <div class="card col-3">
            <img src="{{ $song->poster }}" alt="...">
            <div class="card-body">
                <h5 class="card-title">Title: {{ $song->title }}</h5>
                <h6 class="card-title">Album: {{ $song->album }}</h6>
                <h6 class="card-title">Author: {{ $song->author }}</h6>
                <h6 class="card-title">Editor: {{ $song->editor }}</h6>
                <h6 class="card-title">Length: {{ $song->length }}</h6>


                <a href="{{ route('songs.index') }}" class="btn btn-primary">Back to list</a>
            </div>
        </div>
    </div>
@endsection
