<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_industry_code')->nullable($value = true);
            $table->string('customer_industry_desc')->nullable($value = true);
            $table->string('customer_sector_desc')->nullable($value = true);
            $table->string('cif')->nullable();
            $table->string('customer_name')->nullable($value = true);
            $table->string('alternate_name')->nullable($value = true);
            $table->string('trade_name')->nullable($value = true);
            $table->string('deceased_date')->nullable();
            $table->string('customer_birth_date')->nullable();
            $table->string('customer_open_date')->nullable();
            $table->string('rolling_gic')->nullable($value = true);
            $table->string('efg_flag')->nullable($value = true);
            $table->string('calendar_date')->nullable();
            $table->string('exempect_deceased')->nullable($value = true);
            $table->string('posting_restriction')->nullable();
            $table->string('quarter')->nullable($value = true);
            $table->integer('account_id')->unsigned();
            $table->integer('branch_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->integer('dao_id')->unsigned();
            $table->integer('broker_id')->unsigned();
            $table->integer('loan_lending_id')->unsigned();
            $table->integer('metrics_id')->unsigned();
            $table->integer('account_type_id')->unsigned();
            $table->string('account_type')->nullable();
            $table->string('status')->nullable();
            $table->integer('deleted')->default('0');
            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('account')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('address')->onDelete('cascade');
            $table->foreign('dao_id')->references('id')->on('dao')->onDelete('cascade');
            $table->foreign('broker_id')->references('id')->on('broker')->onDelete('cascade');
            $table->foreign('loan_lending_id')->references('id')->on('loan_lending')->onDelete('cascade');
            $table->foreign('metrics_id')->references('id')->on('metrics')->onDelete('cascade');
            $table->foreign('branch_id')->references('id')->on('branch')->onDelete('cascade');
            //$table->foreign('customer_id')->references('id')->on('customer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');

    }
}
