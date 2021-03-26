<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details_hotels', function (Blueprint $table) {
            $table->id();
            $table->string('nameroom');
            $table->string('typeroom');
            $table->string('priceroom');
            $table->string('numbed');
            $table->string('typebed');
            $table->string('numguest');
            $table->longText('Facilities');
            $table->longText('meansofcomfort');
            $table->string('kids');
            $table->string('animals');
            $table->string('access');
            $table->string('breckfast');
            $table->string('imageroom1');
            $table->string('imageroom2');
            $table->string('numroom');
            $table->string('imageroom3');
            $table->unsignedBigInteger('details_id');
            $table->foreign('details_id')->references('id')->on('inform_hotels')->onDelete('cascade');
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
        Schema::dropIfExists('details_hotels');
    }
}
