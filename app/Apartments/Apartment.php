<?php

namespace App\Apartments;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
	    'name',
        'cover_image',
        'address',
        'district',
        'price',
        'bedroom_total',
        'unit_total',
        'maintenance_fee',
        'facilities',
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
