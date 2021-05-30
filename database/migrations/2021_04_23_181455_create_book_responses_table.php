<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_responses', function (Blueprint $table) {
            $table->id();
            $table->string('customer_email')->nullable();
            $table->string('driver_email')->nullable();  

            $table->bigInteger('book_id')->unsigned()->nullable();
            $table->foreign('book_id')->references('id')->on('book_requests');

            $table->double('response_amount')->nullable();
            $table->string('response_status')->nullable();
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
        Schema::dropIfExists('book_responses');
    }
}
