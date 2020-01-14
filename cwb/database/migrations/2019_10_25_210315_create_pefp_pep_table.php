<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePefpPepTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pefp_pep', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pefp_flag')->nullable($value = true);
            $table->string('pep_flag')->nullable($value = true);
            $table->string('pefp_pep_def_comm')->nullable($value = true);

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
        Schema::dropIfExists('pefp_pep');
    }
}
