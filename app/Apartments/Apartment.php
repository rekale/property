<?php

namespace App\Apartments;

use App\Http\Controllers\Admin\ApartmentsController;
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

    public function albums()
    {
        return $this->belongsToMany(Album::class)->withPivot('images');
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
