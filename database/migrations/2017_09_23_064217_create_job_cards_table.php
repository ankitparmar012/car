<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('job_cards')) {
            Schema::create('job_cards', function (Blueprint $table) {
                $table->increments('id_job_card');
                $table->integer('fk_id_customer');
                $table->integer('fk_id_car');
                $table->integer('total_services_price');
                $table->string('status')->default("New");
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
        Schema::dropIfExists('job_cards');
    }
}
