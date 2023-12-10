@extends('layouts.app')


@section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="header">
        <h2>{{ $album->name}}</h2>
    </div>

    <div class="grid-container">
        @if(count($album->photos) > 0)
            @foreach ($album->photos as $photo)
                <div class="item">
                    <img src="/storage/photos/{{$album->id}}/{{$photo->photo}}" class="card-img-top" alt="..." width="250" height="200">
                    <div class="details">
                        <p class="card-text">City: {{$photo->title}}</p>
                        <p class="card-text">Description: {{$photo->description}}</p>
                        <p class="card-text">Size: {{$photo->size}}</p>
                        <button><a href="{{ route('photos.show', $photo->id)}}">more...</a></button>
                    </div>


                </div>
            @endforeach
        @else
                <p style="color:black">No photos to display</p>
        @endif
    </div>


</div>
<div class="photo-upload">
    <button><a href="{{ route('photos.create', $album->id) }}">Upload Photo</a></button>
    <button><a href="/albums">Back</a></button>
</div>
@endsection
