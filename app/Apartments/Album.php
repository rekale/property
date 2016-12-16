<?php

namespace App\Apartments;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
    	'apartment_id',
    	'name',
    ];

    public function apartment()
    {
    	return $this->belongsTo(Apartment::class);
    }

    public function photos()
    {
    	return $this->hasMany(Photo::class);
    }
}
