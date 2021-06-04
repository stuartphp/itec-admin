<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('product_category_id');
            $table->string('product_code',20)->unique();
            $table->string('name');
            $table->text('description');
            $table->string('keywords');
            $table->unsignedTinyInteger('unit');
            $table->double('unit_price');
            $table->char('currency', 3)->default('ZAR');
            $table->double('retail_price');
            $table->double('special_price');
            $table->date('special_start');
            $table->date('special_end');
            $table->integer('on_hand');
            $table->unsignedInteger('min_order_quantity');
            $table->unsignedInteger('weight_gram');
            $table->unsignedInteger('length_cm');
            $table->unsignedInteger('width_cm');
            $table->unsignedInteger('height_cm');
            $table->date('expiry_date')->nullable();
            $table->string('main_image')->nullable();
            $table->unsignedInteger('viewed')->default(1);
            $table->string('is_service');
            $table->string('is_active');
            $table->string('is_feature');
            $table->timestamps();
            $table->foreign('product_category_id')->references('id')->on('product_categories');
            $table->foreignId('product_category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
