<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_requests', function (Blueprint $table) {
            $table->id();
            $table->string('customer_email')->nullable();
            $table->string('driver_email')->nullable(); 
            $table->string('customer_phone')->nullable();
            $table->string('driver_phone')->nullable();                        
            $table->string('vehicle_category')->nullable();
            $table->string('trip_time')->nullable();
            $table->string('where_to')->nullable();
            $table->string('destinetion')->nullable();
            $table->longText('transport_material')->nullable();
            $table->string('trip_status')->nullable();
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
        Schema::dropIfExists('book_requests');
    }
}
