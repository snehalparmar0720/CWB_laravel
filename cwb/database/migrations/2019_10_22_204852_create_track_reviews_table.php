<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('track_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned();
            $table->integer('address_review_track')->default('0');
            $table->integer('id_review_track')->default('0');
            $table->integer('noc_review_track')->default('0');
            $table->integer('occupation_review_track')->default('0');
            $table->integer('employer_review_track')->default('0');
            $table->integer('pefp_pep_review_track')->default('0');
            $table->integer('third_party_review_track')->default('0');
            $table->integer('intended_use_review_track')->default('0');
            $table->integer('average_money_review_track')->default('0');
            $table->integer('metrics_review_track')->default('0');
            $table->integer('cwb_review_track')->default('0');
            $table->integer('non_personal_review_track')->default('0');
            $table->integer('charity_review_track')->default('0');
            $table->integer('naics_review_track')->default('0');
            $table->integer('dob_review_track')->default('0');
            $table->integer('role_review_track')->default('0');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('track_reviews');
    }
}
