<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address_review')->nullable($value = true);
            $table->string('physical_date_review')->nullable($value = "0000-00-00");
            $table->string('physical_reviewed_by')->nullable($value = true);
            $table->string('physical_qa_by')->nullable($value = true);
            $table->string('physical_qa_note')->nullable($value = true);
            $table->string('electronic_qa_by')->nullable($value = true);
            $table->string('electronic_qa_note')->nullable($value = true);
            $table->string('electronic_qa_rating')->nullable($value = true);
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
        Schema::dropIfExists('review');
    }
}
