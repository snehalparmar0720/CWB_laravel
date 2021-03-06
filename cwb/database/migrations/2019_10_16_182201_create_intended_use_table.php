<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntendedUseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intended_use', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_code')->nullable($value = true);
            $table->string('intended_use_code')->nullable($value = true);
            $table->string('intended_use_desc')->nullable($value = true);
            $table->string('intended_use_other_desc')->nullable($value = true);
            $table->string('intended_use_def_comm')->nullable($value = true);
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
        Schema::dropIfExists('intended_use');
    }
}
