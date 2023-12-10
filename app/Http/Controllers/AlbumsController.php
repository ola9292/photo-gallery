<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::all();

        return view('albums.index',[
            'albums' => $albums,
        ]);
    }
    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image'
        ]);

        $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();

        return redirect('/albums')->with('success', 'Album created successfully!');
    }

    public function show($id)
    {

        $album = Album::with('photos')->find($id);

        return view('albums.show',[
            'album' => $album,
        ]);
    }

    public function edit($id)
    {
        $album = Album::find($id);
       return view('albums.edit',[
            'album' => $album,
       ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover_image' => 'required|image'
        ]);

        $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        $album = Album::find($id);
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();

        return redirect('/albums')->with('success', 'Album updated successfully!');
    }
}
