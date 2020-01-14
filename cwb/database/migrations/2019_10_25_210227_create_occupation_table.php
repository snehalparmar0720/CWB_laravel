<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupation', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_occupation_desc')->nullable($value = true);
            $table->string('customer_employment_status_desc')->nullable($value = true);
            $table->string('occupation_def_comm')->nullable($value = true);
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
        Schema::dropIfExists('occupation');
    }
}
