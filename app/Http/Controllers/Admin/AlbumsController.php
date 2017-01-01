<?php

namespace App\Http\Controllers\Admin;

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Apartments\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:2,3', ['except' => ['index']]);
    }

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

        $album = Apartment::findOrFail($apartmentId)
                 ->albums()
                 ->findOrFail($albumId);

        $album->update($request->all());

        Notification::create([
            'user_id' => $request->user()->id,
            'message' => 'album ' . $album->name . ' has been updated',
        ]);

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

        $album = Apartment::findOrFail($id)->albums()->create($request->all());

         Notification::create([
            'user_id' => $request->user()->id,
            'message' => 'album ' . $album->name . ' has been created',
        ]);

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
    public function destroy($apartmentId, $albumId, Request $request)
    {
        $album = Apartment::findOrFail($apartmentId)
                 ->albums()
                 ->findOrFail($albumId);

        $album->delete();
        
        Notification::create([
            'user_id' => $request->user()->id,
            'message' => 'album ' . $album->name . ' has been deleted',
        ]);

        flash('album has been deleted');

        return redirect()->route('apartments.albums.index', ['id' => $apartmentId]);
    }
}
