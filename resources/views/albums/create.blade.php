@extends('layouts.app')


@section('content')

<div class="container">
    <h1>Create New Album</h1>
    <form action="{{ route('albums.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          @error('name')
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
            <label for="exampleInputPassword1" class="form-label">Cover Image</label>
            <input type="file" name="cover_image" class="form-control" id="exampleInputPassword1">
          </div>
          @error('cover_image')
            <div style="color:red">{{ $message }}</div>
          @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
