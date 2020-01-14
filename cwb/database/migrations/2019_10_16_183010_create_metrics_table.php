<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metrics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('joint_total_count')->nullable($value = true);
            $table->integer('primary_count')->nullable($value = true);
            $table->integer('joint_joint_count')->nullable($value = true);
            $table->integer('joint_singer_count')->nullable($value = true);
            $table->integer('joint_power_of_attorney_count')->nullable($value = true);
            $table->integer('joint_executor_count')->nullable($value = true);
            $table->integer('joint_trustee_count')->nullable($value = true);
            $table->integer('joint_tenants_in_common_count')->nullable($value = true);
            $table->integer('joint_guarantor_count')->nullable($value = true);
            $table->integer('joint_third_party_count')->nullable($value = true);
            $table->integer('joint_other_count')->nullable($value = true);
            $table->integer('total_account_count')->nullable($value = true);
            $table->integer('total_deposit_count')->nullable($value = true);
            $table->integer('total_demand_account_count')->nullable($value = true);
            $table->integer('total_loan_count')->nullable($value = true);
            $table->integer('total_term_deposit_count')->nullable($value = true);
            $table->integer('EFG_CIF_count')->nullable($value = true);
            $table->integer('CIF_ITF_count')->nullable($value = true);
            $table->integer('low_confirm_cif_count')->nullable($value = true);
            $table->string('account_count')->nullable($value = true);
            $table->integer('itf_account_count')->nullable($value = true);
            $table->integer('cif_count')->nullable($value = true);
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
        Schema::dropIfExists('metrics');
    }
}
