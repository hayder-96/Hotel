<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inform_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('namehotel');
            $table->string('evaluation');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('manger');
            $table->string('number');
            $table->string('country');
            $table->string('city');
            $table->string('latitude')->unique();
            $table->string('longtude')->unique();
             $table->string('email');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
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
        Schema::dropIfExists('inform_hotels');
    }
}
