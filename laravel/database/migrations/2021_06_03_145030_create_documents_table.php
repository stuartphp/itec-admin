<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('document_flow_id');
            $table->string('document_type', 30);
            $table->char('gcs',1)->default('G');
            $table->date('action_date');
            $table->string('account_number', 50)->unique();
            $table->unsignedBigInteger('entity_id');
            $table->string('entity_name');
            $table->string('document_number');
            $table->text('physical_address')->nullable();
            $table->text('delivery_address')->nullable();
            $table->string('entity_reference')->nullable();
            $table->unsignedBigInteger('salesperson_id')->nullable();
            $table->date('due_date')->nullable();
            $table->text('notes')->nullable();
            $table->unsignedTinyInteger('courier_id')->nullable();
            $table->string('tracking_number',70)->nullable();
            $table->string('document_image')->nullable();
            $table->boolean('on_hold')->default(0);
            $table->double('total_nett_price')->nullable();
            $table->double('total_excl')->nullable();
            $table->double('total_discount')->nullable();
            $table->double('total_tax')->nullable();
            $table->double('total_amount')->nullable();
            $table->boolean('is_locked')->default(0);
            $table->boolean('is_paid')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
