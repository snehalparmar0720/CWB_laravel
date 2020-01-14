<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dao', function (Blueprint $table) {
            $table->increments('id');
            $table->string('acct_dao_number')->nullable($value = true);
            $table->string('acct_dao_fullname')->nullable($value = true);
            $table->string('account_dao_branch_desc')->nullable($value = true);
            $table->string('account_dao_dept')->nullable($value = true);
            $table->string('cust_dao_number')->nullable($value = true);
            $table->string('cust_dao_fullname')->nullable($value = true);
            $table->string('cust_dao_branch_desc')->nullable($value = true);
            $table->string('cust_dao_dept')->nullable($value = true);
            $table->string('efg_dao')->nullable($value = true);
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
        Schema::dropIfExists('dao');
    }
}
