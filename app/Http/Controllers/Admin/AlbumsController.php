<?php

namespace App\Http\Controllers\Admin;

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{

    public function index($id)
    {
        $apartment = Apartment::with('albums')->find($id); 

        return view('admin.albums.index', compact('apartment'));
    }

    public function update($apartmentId, $albumId, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Apartment::findOrFail($apartmentId)
                 ->albums()
                 ->findOrFail($albumId)
                 ->update($request->all());

        flash('album has been updated');

        return redirect()->route('apartments.albums.index', ['id' => $apartmentId]);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $apartment = Apartment::findOrFail($id);
        
        return view('admin.albums.create', compact('apartment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        Apartment::findOrFail($id)->albums()->create($request->all());

        flash('New album has been created');

        return redirect()->route('apartments.albums.index', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($apartmentId, $albumId)
    {
        $apartment = Apartment::with(['albums' => function($query) use ($albumId) {
            $query->whereId($albumId);
        }])->findOrFail($apartmentId);

        return view('admin.albums.edit', compact('apartment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($apartmentId, $albumId)
    {
        Apartment::findOrFail($apartmentId)
                 ->albums()
                 ->findOrFail($albumId)
                 ->delete();

        flash('album has been deleted');

        return redirect()->route('apartments.albums.index', ['id' => $apartmentId]);
    }
}
