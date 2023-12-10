<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{


    public function index()
    {
        return view('photos.index',[

        ]);
    }

    public function create($id)
    {
        return view('photos.create',[
            'id'=>$id,
        ]);
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image'
        ]);

        $filenameWithExtension = $request->file('photo')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('photo')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $request->file('photo')->storeAs('public/photos/'.$request->input('album_id'), $filenameToStore);

        $photo = new Photo();
        $photo->album_id = $request->input('album_id');
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $filenameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->save();

        $album_id = $request->input('album_id');

        return redirect('/albums/' . $album_id)->with('success', 'photo uploaded successfully!');

    }

    public function show($id){
        $photo = Photo::find($id);

        return view('photos.show',[
            'photo' => $photo,
        ]);
    }

    public function destroy($id){
        $photo = Photo::find($id);

        if (Storage::delete('public/albums/'.$photo->album_id.'/'.$photo->photo)) {
            $photo->delete();

            return redirect('/albums')->with('success', 'Photo deleted successfully!');
        }
    }
}
