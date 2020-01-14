<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cif')->nullable();
            $table->string('line_1_address')->nullable($value = true);
            $table->string('line_2_address')->nullable($value = true);
            $table->string('line_3_address')->nullable($value = true);
            $table->string('line_1_address_legal')->nullable($value = true);
            $table->string('line_2_address_legal')->nullable($value = true);
            $table->string('line_3_address_legal')->nullable($value = true);
            $table->string('customer_city_name')->nullable($value = true);
            $table->string('postal_code')->nullable($value = true);
            $table->string('province_state_code')->nullable($value = true);
            $table->string('address_country_code')->nullable($value = true);
            $table->string('customer_city_name_legal')->nullable($value = true);
            $table->string('postal_code_legal')->nullable($value = true);
            $table->string('province_state_code_legal')->nullable($value = true);
            $table->string('address_country_code_legal')->nullable($value = true);
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
        Schema::dropIfExists('address');
    }
}
