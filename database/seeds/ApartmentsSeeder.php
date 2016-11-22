<?php

use Illuminate\Database\Seeder;
use App\Apartments\Apartment;
use App\Apartments\Image;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class, 50)->create()->each(function ($apartment) {
		  	$apartment->images()->saveMany(factory(Image::class, 10)->make());
	 	 });
    }
}
