<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function (Blueprint $table) {
            $table->increments('acc_id');
            $table->string('acc_name', 50);
            $table->unsignedInteger('owner_id');
            $table->string('description', 200);
            $table->string('phone', 15);
            $table->double('price', 6, 2);
            $table->integer('rooms');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accommodations');
    }
}
