<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('product_id');
            $table->string('code', 20);
            $table->string('name');
            $table->unsignedTinyInteger('unit');
            $table->unsignedInteger('quantity');
            $table->double('tax');
            $table->double('price_excl');
            $table->double('total');
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
        Schema::dropIfExists('document_items');
    }
}
