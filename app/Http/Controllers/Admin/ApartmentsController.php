<?php

namespace App\Http\Controllers\Admin;

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Http\Controllers\Controller;
use App\Http\Requests\ApartmentRequest;
use Illuminate\Http\Request;

class ApartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:2,3', ['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fieldSearchable = [
            'name',
            'address',
            'district',
            'price'
        ];
        
        $apartments = Apartment::with('albums')
                                ->search($request->input('q'))
                                ->sort($request->input('field'), $request->input('sort'))
                                ->pricerange($request->input('range'))
                                ->paginate();

        return view('admin.apartments.index', compact('apartments', 'fieldSearchable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $albums = Album::pluck('name', 'id');
        
        return view('admin.apartments.create', compact('albums'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApartmentRequest $request)
    {

        $apartment = Apartment::create($request->all());

        $link = $request->cover_image->store('apartments/'. $apartment->id);
            
        $path = asset('storage/' . $link); 
        
        $apartment->cover_image = $path;

        $apartment->save();

        Notification::create([
            'user_id' => $request->user()->id,
            'message' => 'apartment ' . $apartment->name . ' has been created',
        ]);

        flash('apartment has been created.', 'success');

        return redirect()->route('apartments.index');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ApartmentRequest $request, $id)
    {
        $input = $request->all(); 
        
        $apartment = Apartment::find($id);

        $apartment->name = $input['name'];
        $apartment->address = $input['address'];
        $apartment->district = $input['district'];
        $apartment->price = $input['price'];
        $apartment->bedroom_total = $input['bedroom_total'];
        $apartment->unit_total = $input['unit_total'];
        $apartment->maintenance_fee = $input['maintenance_fee'];
        $apartment->facilities = $input['facilities'];

        if(isset($request->cover_image)) {
            $link = $request->cover_image->store('apartments/'. $id);
            
            $path = asset('storage/' . $link); 

            $apartment->cover_image = $path;
        }

        $apartment->save();

        Notification::create([
            'user_id' => $request->user()->id,
            'message' => 'apartment ' . $apartment->name . ' has been updated',
        ]);

        flash('apartement has been updated', 'success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Apartment::destroy($id);

        Notification::create([
            'user_id' => $request->user()->id,
            'message' => 'apartment ' . $apartment->name . ' has been deleted',
        ]);

        flash('apartment has been deleted', 'success');

        return redirect()->back();
    }
}
