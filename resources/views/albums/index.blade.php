@extends('layouts.app')


@section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="header">
        <h2>My Albums</h2>
    </div>

    <div class="grid-container">
        @if(count($albums) > 0)
            @foreach ($albums as $album)
                    <div class="item" style="">
                        <img src="/storage/album_covers/{{$album->cover_image}}" class="" alt="..." width="" height="200">
                        <div class="details">
                            <h3 class="">{{$album->name}}</h3>
                            <p class="">Description: {{$album->description}}</p>
                            <div class="flex-container">
                                <button class="view-btn"><a href="{{ route('albums.show', $album->id)}}">View</a></button>
                                <button class="edit-btn"><a href="{{ route('albums.edit', $album->id)}}">Edit</a></button>
                            </div>

                        </div>
                    </div>
            @endforeach
        @else
                    <p style="color:black">No albums to dsiplay</p>
        @endif
    </div>

</div>
@endsection
