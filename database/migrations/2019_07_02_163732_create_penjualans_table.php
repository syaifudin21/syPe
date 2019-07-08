<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenjualansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice');
            $table->json('produk');
            $table->json('produk_refisi')->nullable(); //dilakukan 
            $table->integer('ownner_id')->nullable();
            $table->integer('outlet_id');
            $table->integer('kasir_id');
            $table->integer('pelanggan_id')->nullable();
            $table->integer('tagihan');
            $table->integer('tagihan_refisi')->nullable();
            $table->enum('status', ['Draft', 'Lunas']);
            $table->string('catatan');
            $table->softDeletes();
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
        Schema::dropIfExists('penjualans');
    }
}
