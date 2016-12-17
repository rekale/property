<?php

namespace App\Http\Controllers\Admin;

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotosController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:2,3', ['except' => ['index']]);
    }
    
    public function index($apartmentId, $albumId)
    {
        $apartment = Apartment::findOrFail($apartmentId);

        $album = $apartment->albums()
                          ->with('photos')
                          ->findOrFail($albumId);

        return view('admin.photos.index', compact('apartment' ,'album'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($apartmentId, $albumId)
    {
        $apartment = Apartment::findOrFail($apartmentId);

        $album = $apartment->albums()
                          ->with('photos')
                          ->findOrFail($albumId);

        return view('admin.photos.create', compact('album', 'apartment'));
    }

    public function store($apartmentId, $albumId, Request $request)
    {
        $apartment = Apartment::findOrFail($apartmentId);

        $album = $apartment->albums()
                          ->with('photos')
                          ->findOrFail($albumId);

        $images = $request->file('images');

        foreach($images as $image) {
            
            $link = $image->store('/');
                
            $album->photos()->create([
                'url' => asset('storage/' . $link),
            ]);
    
        }

        flash('photo has been uploaded', 'success');

        return redirect()->route('apartments.albums.photos.index', compact('apartmentId', 'albumId'));
    }

    public function destroy($apartmentId, $albumId, $photoId)
    {
        Apartment::findOrFail($apartmentId)
                 ->albums()
                 ->findOrFail($albumId)
                 ->photos()
                 ->findOrFail($photoId)
                 ->delete();

        flash('photo has been deleted', 'success');

        return redirect()->back();
    }
}
