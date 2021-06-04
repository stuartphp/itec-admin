<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountingPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounting_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('financial_year_id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('locked')->default(0);
            $table->timestamps();
            $table->foreign('financial_year_id')->references('id')->on('financial_years');
            $table->foreignId('financial_year_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounting_periods');
    }
}
