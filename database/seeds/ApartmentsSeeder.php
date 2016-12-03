<?php

use App\Apartments\Album;
use App\Apartments\Apartment;
use App\Apartments\Image;
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
    	$albums = factory(Album::class, 5)->create();

    	$fake = Faker\Factory::create();

    	$images = [
    		$fake->imageUrl(640, 480),
    		$fake->imageUrl(640, 480),
    		$fake->imageUrl(640, 480),
    		$fake->imageUrl(640, 480),
    		$fake->imageUrl(640, 480),
    	];

        factory(Apartment::class, 50)->create()->each(function($apartment) use ($albums, $images) {
        	foreach($albums as $album) {
        		$apartment->albums()->attach($album->id, ['images' => json_encode($images)]);
        	}
        });

    }
}
