<?php

namespace App\Apartments;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
    	'apartement_id',
    	'name',
    	'url',
    ];
}
