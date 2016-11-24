<?php

namespace App\Apartments;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Admin\ApartmentsController;

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

    public function getFacilitiesAttribute($value)
    {
        return json_decode($value);
    }

    public function setFacilitiesAttribute($value)
    {
         $this->attributes['facilities'] = json_encode($value);
    }
}
