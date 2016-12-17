<?php

namespace App\Apartments;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
    	'album_id',
    	'url',
    ];

    public function albums()
    {
    	return $this->belongsTo(Album::class);
    }
}
