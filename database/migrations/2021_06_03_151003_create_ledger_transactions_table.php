<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('action_date');
            $table->unsignedBigInteger('entity_id');
            $table->string('description');
            $table->unsignedBigInteger('document_id');
            $table->char('gcs', 1)->default('G');
            $table->unsignedSmallInteger('ledger');
            $table->double('debit_amount')->nullable();
            $table->double('credit_amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('entity_id')->references('id')->on('entities')->cascadeOnDelete()->cascadeOnDelete();
            $table->foreign('document_id')->references('id')->on('documents')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ledger_transactions');
    }
}
