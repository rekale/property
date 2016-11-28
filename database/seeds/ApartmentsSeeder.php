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
        factory(Apartment::class, 50)->create();
    }
}
