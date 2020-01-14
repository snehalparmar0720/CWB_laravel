<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joint', function (Blueprint $table) {
            $table->increments('id');
            $table->string('joint_cif')->nullable();
            $table->string('joint_customer_status_desc')->nullable($value = true);
            $table->string('joint_customer_name')->nullable($value = true);
            $table->string('dob_def_comm')->nullable($value = true);
            $table->string('joint_type_desc')->nullable($value = true);
            $table->string('type_def_comm')->nullable($value = true);
            $table->string('multiple_cifs')->nullable($value = true);
            $table->string('selected_for_role_review')->nullable($value = true);
            $table->string('cif_relation')->nullable($value = true);
            $table->string('personal_cif_role')->nullable($value = true);
            $table->string('correct_role')->nullable($value = true);
            $table->string('highest_aml_requirement_role')->nullable($value = true);
            $table->string('role_def_comm')->nullable($value = true);
            $table->string('joint_office_phone')->nullable($value = true);
            $table->string('sin')->nullable();
            $table->string('after_december_17')->nullable($value = true);
            $table->string('youth')->nullable($value = true);
            
            $table->integer('review_id')->unsigned();
            $table->integer('joint_review_id')->unsigned();
            $table->integer('noc_id')->unsigned();
            $table->integer('pefp_pep_id')->unsigned();
            $table->integer('employer_id')->unsigned();
            $table->integer('occupation_id')->unsigned();
            $table->integer('identification_id')->unsigned();
            $table->integer('residence_id')->unsigned();

            $table->timestamps();


            $table->foreign('review_id')->references('id')->on('review')->onDelete('cascade');
            $table->foreign('joint_review_id')->references('id')->on('joint_review')->onDelete('cascade');
            $table->foreign('noc_id')->references('id')->on('noc')->onDelete('cascade');
            $table->foreign('pefp_pep_id')->references('id')->on('pefp_pep')->onDelete('cascade');
            $table->foreign('employer_id')->references('id')->on('employer')->onDelete('cascade');
            $table->foreign('occupation_id')->references('id')->on('occupation')->onDelete('cascade');
            $table->foreign('identification_id')->references('id')->on('identification')->onDelete('cascade');
            $table->foreign('residence_id')->references('id')->on('residence')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('joint');
    }
}
