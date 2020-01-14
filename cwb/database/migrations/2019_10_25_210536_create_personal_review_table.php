<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_review', function (Blueprint $table) {
            $table->increments('id');
            // $table->string('employee_name_loan_only')->nullable($value = true);
            $table->string('physical_deficient')->nullable($value = true);
            $table->string('anticipated_acct_activities')->nullable($value = true);
            $table->string('id_review')->nullable($value = true);
            $table->string('noc_r')->nullable($value = true);
            $table->string('occupation_review')->nullable($value = true);
            $table->string('third_party')->nullable($value = true);
            $table->string('intended_use')->nullable($value = true);
            $table->string('pefp_review')->nullable($value = true);
            $table->string('pep_review')->nullable($value = true);
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
        Schema::dropIfExists('personal_review');
    }
}
