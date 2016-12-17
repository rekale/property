<?php

namespace App\Http\Controllers\Admin;

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotosController extends Controller
{

    public function index($apartmentId, $albumId)
    {
        $album = Apartment::findOrFail($apartmentId)
                          ->albums()
                          ->with('photos')
                          ->findOrFail($albumId);

        return view('admin.photos.index', compact('album'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload()
    {
        $apartments = Apartment::pluck('name', 'id');
        $albums = Album::pluck('name', 'id');

        return view('admin.albums.upload', compact('albums', 'apartments'));
    }

    public function uploadStore(Request $request)
    {
        $apartment = Apartment::find($request->input('apartment_id'));
        $images = $request->file('images');
        $paths = [];

        foreach($images as $image) {
            
            $link = $image->store('apartments/'. $apartment->id . '/albums');
                
            $paths[] = asset('storage/' . $link); 
    
        }

        $apartment->albums()->attach($request->input('album_id'), ['images' => json_encode($paths)]);

        flash('photo has been uploaded', 'success');

        return redirect()->back();
    }
}
