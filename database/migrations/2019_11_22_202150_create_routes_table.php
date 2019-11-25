<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('wall_location'); //coord_id
            $table->string('type');
            $table->string('difficulty');
            $table->date('set_date');
            $table->date('expire_date');
            $table->boolean('active');
            $table->timestamps();

            $table->foreign('wall_location')->references('id')->on('coords');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('routes');
    }
}
