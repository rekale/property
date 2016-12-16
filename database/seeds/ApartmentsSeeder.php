<?php

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Apartments\Image;
use App\Apartments\Photo;
use Illuminate\Database\Seeder;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	
    	$fake = Faker\Factory::create();

        $apartments = factory(Apartment::class, 50)->create()->each(function($apartment){
            $apartment->albums()->saveMany(factory(Album::class, 3)->make());
        });

        Album::all()->each(function($album){
            $album->photos()->saveMany(factory(Photo::class, 5)->make());
        });

    }
}
