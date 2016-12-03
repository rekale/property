<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumApartmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_apartment', function (Blueprint $table) {
            $table->unsignedInteger('album_id');
            $table->unsignedInteger('apartment_id');
            $table->text('images');
            $table->timestamps();

            $table->primary(['apartment_id', 'album_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album_apartment');
    }
}
