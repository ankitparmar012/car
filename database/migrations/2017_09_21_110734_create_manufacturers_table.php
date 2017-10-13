<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('manufacturers')) {
            Schema::create('manufacturers', function (Blueprint $table) {
                $table->increments('id_manufacturer');
                $table->string('manufacturer_by')->nullable();
                $table->string('img')->nullable();
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
        Schema::dropIfExists('manufacturers');
    }
}
