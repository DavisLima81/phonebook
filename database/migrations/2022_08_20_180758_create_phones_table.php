<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('phone_area_id');
            $table->integer('number');
            $table->unsignedBigInteger('phone_type_id');
            $table->unsignedBigInteger('contact_id');
            $table->timestamps();

            /* CHAVES ESTRANGEIRAS */
            $table->foreign('phone_area_id')->references('id')->on('phone_areas');
            $table->foreign('phone_type_id')->references('id')->on('phone_types');
            $table->foreign('contact_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
}
