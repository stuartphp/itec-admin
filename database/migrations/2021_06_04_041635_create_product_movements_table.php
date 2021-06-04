<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('document_id');
            $table->date('action_date');
            $table->unsignedInteger('up')->nullable();
            $table->unsignedInteger('down')->nullable();
            $table->timestamps();
            $table->foreign('document_id')->references('id')->on('documents');
            $table->foreignId('document_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('product_movements');
    }
}
