<?php

namespace App\Apartments;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
    	'user_id',
    	'message',
    	'read',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
