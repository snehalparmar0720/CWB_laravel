<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonPersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cif_status_desc')->nullable($value = true);
            $table->integer('naics_code')->nullable($value = true);
            $table->string('naics_name')->nullable($value = true);
            $table->string('naics_sector_name')->nullable($value = true);
            $table->string('naics_internal_sector_name')->nullable($value = true);
            $table->string('naics_lookup')->nullable($value = true);
            $table->string('naics_prohibited')->nullable($value = true);
            $table->string('name_holding_but_not_holding_company')->nullable($value = true);
            $table->string('naics_def_comm')->nullable($value = true);
            $table->string('accepts_donations_flag')->nullable($value = true);
            $table->string('registered_charity_flag')->nullable($value = true);
            $table->string('charity_def_comm')->nullable($value = true);
            $table->string('review_eligible')->nullable($value = true);
            $table->string('duplicate_cif_different_branches')->nullable($value = true);
            $table->string('at_least_1')->nullable($value = true);
            $table->string('same_name_different_cif')->nullable($value = true);
            $table->integer('residence_id')->unsigned();
            $table->integer('review_id')->unsigned();
            $table->integer('non_personal_review_id')->unsigned();
            $table->integer('third_party_id')->unsigned();
            $table->integer('average_money_id')->unsigned();
            $table->integer('intended_use_id')->unsigned();
            $table->timestamps();


            $table->foreign('residence_id')->references('id')->on('residence')->onDelete('cascade');
            $table->foreign('review_id')->references('id')->on('review')->onDelete('cascade');
            $table->foreign('non_personal_review_id')->references('id')->on('non_personal_review')->onDelete('cascade');
            $table->foreign('third_party_id')->references('id')->on('third_party')->onDelete('cascade');
            $table->foreign('average_money_id')->references('id')->on('average_money')->onDelete('cascade');
            $table->foreign('intended_use_id')->references('id')->on('intended_use')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('non_personal');
    }
}
