<?php

namespace App\Http\Controllers\Admin;

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{

    public function index()
    {
        $apartments = Apartment::latest()->paginate();

        return view('admin.albums.index', compact('apartments'));
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Album::create($request->all());

        flash('New album has been created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $apartment = Apartment::find($id); 

        return view('admin.albums.show', compact('apartment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartment = Apartment::findOrFail($id);

        return view('admin.apartments.edit', compact('apartment'));
    }

    public function showImages($album_id, $apartment_id)
    {
        $apartment = Apartment::with('albums')->find($apartment_id);

        $album = $apartment->albums->where('id', $album_id)->flatten()[0];

        $images = json_decode($album->pivot->images);

        debug($images);

        return view('admin.albums.show-images', compact('images'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
