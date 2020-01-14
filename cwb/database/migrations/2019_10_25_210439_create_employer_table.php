<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_employer_business')->nullable($value = true);
            $table->string('customer_employer_name')->nullable($value = true);
            $table->string('customer_employer_address')->nullable($value = true);
            $table->string('customer_employer_name_loan')->nullable($value = true);
            $table->string('customer_employer_address_loan')->nullable($value = true);
            $table->string('employer_def_comm')->nullable($value = true);

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
        Schema::dropIfExists('employer');
    }
}
