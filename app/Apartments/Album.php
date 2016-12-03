<?php

namespace App\Apartments;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = [
    	'name',
    ];

    public function apartments($withPivot = false)
    {
    	$relation = $this->belongsToMany(Apartment::class);

    	return $withPivot ? $relation->withPivot('images') : $relation;
    }
}
