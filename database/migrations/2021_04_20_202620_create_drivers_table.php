<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('age')->nullable();
            $table->string('address')->nullable();                       
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('profileimage')->nullable();
            $table->string('vehicleimage')->nullable();
            $table->string('driving_license')->nullable();
            $table->string('vehicle_license')->nullable();
            $table->string('driver_profile')->nullable();
            $table->boolean('driver_status')->default(1);

            $table->bigInteger('v_category')->unsigned()->nullable();
            $table->foreign('v_category')->references('id')->on('vehicle_categories');

            $table->bigInteger('vehicle')->unsigned()->nullable();
            $table->foreign('vehicle')->references('id')->on('vehicles');

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
        Schema::dropIfExists('drivers');
    }
}
