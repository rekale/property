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

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Album::find($id)->update($request->all());

        flash('album has been updated');

        return redirect()->back();
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
        $apartments = Apartment::all();
        return view('admin.albums.create', compact('apartments'));
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
        $apartment = Apartment::with('albums')->find($id); 

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
        $album = Album::findOrFail($id);

        return view('admin.albums.edit', compact('album'));
    }

    public function showImages($id)
    {
        $album = Album::with('photos')->find($id);

        return view('admin.albums.show-images', compact('album'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Album::destroy($id);

        flash('album has been deleted');

        return redirect()->back();
    }
}
