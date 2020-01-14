<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sin')->nullable();
            $table->string('cif_status_desc')->nullable($value = true);
            $table->string('after_december_17')->nullable($value = true);
            $table->string('youth')->nullable($value = true);
            $table->string('poa')->nullable($value = true);
            $table->string('at_least_1')->nullable($value = true);
            $table->string('review_eligible')->nullable($value = true);
            $table->string('duplicate_cif_different_branches')->nullable($value = true);
            $table->string('same_name_different_cif')->nullable($value = true);
            $table->integer('residence_id')->unsigned();
            $table->integer('review_id')->unsigned();
            $table->integer('personal_review_id')->unsigned();
            $table->integer('third_party_id')->unsigned();
            $table->integer('average_money_id')->unsigned();
            $table->integer('intended_use_id')->unsigned();
            $table->integer('pefp_pep_id')->unsigned();
            $table->integer('employer_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->integer('noc_id')->unsigned();
            $table->integer('identification_id')->unsigned();
            $table->timestamps();


            $table->foreign('residence_id')->references('id')->on('residence')->onDelete('cascade');
            $table->foreign('review_id')->references('id')->on('review')->onDelete('cascade');
            $table->foreign('personal_review_id')->references('id')->on('personal_review')->onDelete('cascade');
            $table->foreign('third_party_id')->references('id')->on('third_party')->onDelete('cascade');
            $table->foreign('average_money_id')->references('id')->on('average_money')->onDelete('cascade');
            $table->foreign('intended_use_id')->references('id')->on('intended_use')->onDelete('cascade');
            $table->foreign('pefp_pep_id')->references('id')->on('pefp_pep')->onDelete('cascade');
            $table->foreign('employer_id')->references('id')->on('employer')->onDelete('cascade');
            $table->foreign('occupation_id')->references('id')->on('occupation')->onDelete('cascade');
            $table->foreign('noc_id')->references('id')->on('noc')->onDelete('cascade');
            $table->foreign('identification_id')->references('id')->on('identification')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
}
