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
            $table->string('imageroom1');
            $table->string('imageroom2');
            $table->string('imageroom3');
            $table->string('manger');
            $table->string('number');
            $table->string('country');
            $table->string('city');
            $table->string('latitude');
            $table->string('longtude');
            $table->string('typeroom');
            $table->string('nameroom');
            $table->string('priceroom');
            $table->string('typebed');
            $table->string('numbed');
            $table->string('numguest');
            $table->longText('Facilities');
            $table->longText('meansofcomfort');
            $table->string('kids');
            $table->string('animals');
            $table->string('access');
            $table->string('breckfast');
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
