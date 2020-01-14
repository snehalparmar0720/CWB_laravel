<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJointReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joint_review', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loan_signer')->nullable($value = true);
            $table->string('dob_review')->nullable($value = true);
            $table->string('assigned_different_branch')->nullable($value = true);
            $table->string('role_review')->nullable($value = true);
            $table->string('incorrect_signing_authority')->nullable($value = true);
            $table->string('optimum_physical_ids')->nullable($value = true);
            $table->string('physical_review')->nullable($value = true);
            $table->string('employers_name_personal_loan')->nullable($value = true);
            $table->string('employers_address_personal_loan')->nullable($value = true);
            $table->string('id_review')->nullable($value = true);
            $table->string('noc_r')->nullable($value = true);
            $table->string('occupation_review')->nullable($value = true);
            $table->string('pefp_review')->nullable($value = true);
            $table->string('pep_review')->nullable($value = true);
            $table->string('physical_deficient')->nullable($value = true);
            
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
        Schema::dropIfExists('joint_review');
    }
}
