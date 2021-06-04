<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entity_id');
            $table->string('bank');
            $table->string('branch');
            $table->string('bank_account_number');
            $table->string('beneficiary_name');
            $table->string('swift_code')->nullable();
            $table->text('beneficiary_address')->nullable();
            $table->string('beneficiary_postal_code')->nullable();
            $table->unsignedSmallInteger('beneficiary_country');
            $table->string('beneficiary_telephone')->nullable();
            $table->string('beneficiary_mobile')->nullable();
            $table->string('beneficiary_website')->nullable();
            $table->timestamps();
            $table->foreign('entity_id')->references('id')->on('entities');
            $table->foreignId('entity_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_details');
    }
}
