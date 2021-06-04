<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entities', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('entity_type');
            $table->string('account_number', 50)->unique();
            $table->string('registered_name')->nullable();
            $table->string('trading_name');
            $table->string('contact_person');
            $table->string('telephone', 50)->nullable();
            $table->string('fax', 50)->nullable();
            $table->string('mobile_phone', 30);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ps1970');
            $table->string('facebook_id')->nullable();
            $table->string('google_id')->nullable();
            $table->string('twitter_id')->nullable();
            $table->text('physical_address');
            $table->text('delivery_address')->nullable();
            $table->string('cart')->nullable();
            $table->string('wishlist')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('vat_reference', 20);
            $table->unsignedTinyInteger('province');
            $table->unsignedSmallInteger('city');
            $table->unsignedInteger('delivery_group_id');
            $table->unsignedBigInteger('salesperson_id')->comment('User id');
            $table->boolean('is_newsletter');
            $table->boolean('is_sms');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entities');
    }
}
