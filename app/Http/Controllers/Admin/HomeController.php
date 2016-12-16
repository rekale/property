<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Apartments\Apartment;
use App\Http\Controllers\Controller;

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
        
        return view('admin.dashboard', compact('apartmentTotal'));
    }
}
