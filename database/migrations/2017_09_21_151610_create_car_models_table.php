<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarModelsTable extends Migration
{
    /*
     * Run the migrations.
     * @return void
     */

    public function up()
    {
        if (!Schema::hasTable('car_models')) {
            Schema::create('car_models', function (Blueprint $table) {
                $table->increments('id_car_model');
                $table->integer('fk_id_manufacturer');
                $table->string('model_name')->nullable();
                $table->text('slug')->nullable();
                $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
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
        Schema::dropIfExists('car_models');
    }
}
