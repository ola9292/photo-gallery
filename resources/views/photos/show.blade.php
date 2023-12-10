@extends('layouts.app')


@section('content')

<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="header">
        <h2>{{ $photo->title}}</h2>
        <p>Size: {{ $photo->size}} Kb</p>
        <form action="{{ route('photos.destroy', $photo->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="del-btn">Delete</button>
        </form>
        <div class="photo-show">
            <img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="" width="700" height="500">
        </div>
        <p>{{ $photo->description }}</p>
    </div>

    <div class="">

    </div>


</div>
{{-- <div class="photo-upload">
    <button><a href="{{ route('photos.create', $album->id) }}">Upload Photo</a></button>
    <button><a href="http://">Back</a></button>
</div> --}}
@endsection
