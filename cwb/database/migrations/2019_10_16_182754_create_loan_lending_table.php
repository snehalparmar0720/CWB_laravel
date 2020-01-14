<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanLendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_lending', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_division_code')->nullable($value = true);
            $table->string('loan_division_desc')->nullable($value = true);
            $table->string('lending_program_code')->nullable($value = true);
            $table->string('lending_program_desc')->nullable($value = true);
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
        Schema::dropIfExists('loan_lending');
    }
}
