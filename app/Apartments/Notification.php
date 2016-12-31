<?php

namespace App\Apartments;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
    	'user_id',
    	'message',
    	'read',
    ];
}
