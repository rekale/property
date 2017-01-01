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
        return $this->hasMany(Album::class);
    }

    public function getFacilitiesAttribute($value)
    {
        return json_decode($value);
    }

    public function setFacilitiesAttribute($value)
    {
         $this->attributes['facilities'] = json_encode($value);
    }


    public function scopeSearch($query, $keyword = null)
    {
        return isset($keyword) ? $query->where('name', 'LIKE', '%' . $keyword . '%') : $query;
    }

    public function scopePricerange($query, $range)
    {
        return ! empty($range[0]) ? $query->where('price', '>=' , $range[0])->where('price', '>=' , $range[1]) : $query;
    }
}
