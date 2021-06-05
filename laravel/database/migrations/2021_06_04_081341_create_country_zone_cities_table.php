<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryZoneCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_zone_cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_zone_id');
            $table->string('city');
            $table->string('suburb');
            $table->char('postal_code', 4);
            $table->timestamps();
            $table->foreign('country_zone_id')->references('id')->on('country_zones')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_zone_cities');
    }
}
