<?php

namespace App\Http\Controllers\Admin;

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Apartments\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apartmentTotal = Apartment::count();
        $albumTotal = Album::count();
        $photoTotal = Photo::count();
        
        return view('admin.dashboard', compact('apartmentTotal', 'albumTotal', 'photoTotal'));
    }
}
