@extends('layouts.app')


@section('content')

<div class="container">
    <h1>Create New Photo</h1>
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="album_id" value="{{ $id }}">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('title')
            <div style="color:red">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Description</label>
          <input type="text" name="description" class="form-control" id="exampleInputPassword1">
          @error('description')
            <div style="color:red">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Photo</label>
            <input type="file" name="photo" class="form-control" id="exampleInputPassword1">
          </div>
          @error('photo')
            <div style="color:red">{{ $message }}</div>
          @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
