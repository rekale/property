<?php

namespace App\Http\Controllers\Admin;

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Apartments\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:2,3');
    }

    public function index()
    {
        $notifications = Notification::with('user')->latest()->paginate();

        return view('admin.notifications.index', compact('notifications'));
    }
}
