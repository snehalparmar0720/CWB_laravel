<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNonPersonalReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_personal_review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naics_r')->nullable($value = true);
            $table->string('charity_r')->nullable($value = true);
            $table->string('ownership_structure')->nullable($value = true);
            $table->string('owners_on_system')->nullable($value = true);
            $table->string('confirmed_existence')->nullable($value = true);
            $table->string('record_of_directors')->nullable($value = true);
            $table->string('directors_on_system')->nullable($value = true);
            $table->string('signers_review')->nullable($value = true);
            $table->string('anticipated_acct_activities')->nullable($value = true);
            $table->string('third_party')->nullable($value = true);
            $table->string('intended_use')->nullable($value = true);
            $table->string('physical_file_review')->nullable($value = true);
            $table->string('filenet_wave')->nullable($value = true);
            $table->date('date_sent')->nullable($value = "0000-00-00");
            $table->date('date_received')->nullable($value = "0000-00-00");
            $table->string('br_note')->nullable($value = true);
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
        Schema::dropIfExists('non_personal_review');
    }
}
