<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->increments('id_customer');
                $table->string('customer_name');
                $table->string('customer_email');
                $table->string('phone_no')->nullable();;
                $table->string('mobile_no')->nullable();;
                $table->string('city')->nullable();;
                $table->string('area')->nullable();;
                $table->integer('p_code')->nullable();;
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
