<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKasirHadirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasir_hadirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kasir_id');
            $table->integer('outlet_id');
            $table->dateTime('waktu_in')->nullable();
            $table->dateTime('waktu_out')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasir_hadirs');
    }
}
