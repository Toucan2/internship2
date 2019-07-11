<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->text('description');
            $table->string('phonenumber', 15);
            $table->double('price', 5, 2);
            $table->integer('roomcount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accomodations');
    }
}
