<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectedJobCardServicesListsTable extends Migration
{
    /**
     * Run the migrations.
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('selected_job_card_services_lists')) {
            Schema::create('selected_job_card_services_lists', function (Blueprint $table) {
                $table->increments('id_selected_job_card');
                $table->integer('fk_id_job_card');
                $table->integer('fk_id_job_card_services');
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
        Schema::dropIfExists('selected_job_card_services_lists');
    }
}
