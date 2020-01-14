<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResidenceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residence', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_of_residence_desc')->nullable($value = true);
            $table->string('cp_address')->nullable($value = true);
            $table->string('cp_city')->nullable($value = true);
            $table->string('cp_postal_code')->nullable($value = true);
            $table->string('cp_province')->nullable($value = true);
            $table->string('cp_country')->nullable($value = true);
            $table->string('address_def_comm')->nullable($value = true);
            $table->string('non_residential_flag')->nullable($value = true);
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
        Schema::dropIfExists('residence');
    }
}
