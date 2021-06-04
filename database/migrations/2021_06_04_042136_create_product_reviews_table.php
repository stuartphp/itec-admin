<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('entity_id');
            $table->date('action_date');
            $table->string('alias');
            $table->unsignedTinyInteger('rating',1);
            $table->boolean('is_active')->default(0);
            $table->timestamps();
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreignId('entity_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('product_reviews');
    }
}
