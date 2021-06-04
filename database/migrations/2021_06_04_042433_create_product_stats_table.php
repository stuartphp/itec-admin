<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->char('year',4);
            $table->char('month',2);
            $table->unsignedInteger('total');
            $table->timestamps();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreignId('product_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stats');
    }
}
