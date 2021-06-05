<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryZonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_zones', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('country_id');
            $table->string('name');
            $table->string('code');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country_zones');
    }
}
