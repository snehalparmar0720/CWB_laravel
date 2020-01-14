<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identification', function (Blueprint $table) {
            $table->increments('id');
            $table->string('count_id_digit')->nullable($value = true);
            $table->string('face_2_face')->nullable($value = true);
            $table->string('agent_affiliate_validation')->nullable($value = true);
            $table->string('matching_criteria')->nullable($value = true);
            $table->string('source_of_information')->nullable($value = true);
            $table->string('customer_id_number')->nullable($value = true);
            $table->string('customer_id_number_type_desc')->nullable($value = true);
            $table->string('expiry_date')->nullable();
            $table->string('customer_identification_country_of_issue_desc')->nullable($value = true);
            $table->string('customer_identification_place_of_issue_desc')->nullable($value = true);
            $table->string('cwb_identify')->nullable($value = true);
            $table->string('employee_verification_date')->nullable();
            $table->string('agent_affiliate_entity')->nullable($value = true);
            $table->string('agent_affiliate_name')->nullable($value = true);
            $table->string('agent_affiliate_verification_date')->nullable();
            $table->string('count_id_digit2')->nullable($value = true);
            $table->string('face_2_face2')->nullable($value = true);
            $table->string('agent_affiliate_validation2')->nullable($value = true);
            $table->string('matching_criteria2')->nullable($value = true);
            $table->string('source_of_information2')->nullable($value = true);
            $table->string('customer_id_number2')->nullable($value = true);
            $table->string('customer_id_number_type_desc2')->nullable($value = true);
            $table->string('expiry_date2')->nullable();
            $table->string('customer_identification_country_of_issue_desc2')->nullable($value = true);
            $table->string('customer_identification_place_of_issue_desc2')->nullable($value = true);
            $table->string('cwb_identify2')->nullable($value = true);
            $table->string('employee_verification_date2')->nullable();
            $table->string('agent_affiliate_entity2')->nullable($value = true);
            $table->string('agent_affiliate_name2')->nullable($value = true);
            $table->string('agent_affiliate_verification_date2')->nullable();
            $table->text('id_deficiency_comments')->nullable();

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
        Schema::dropIfExists('identification');
    }
}
