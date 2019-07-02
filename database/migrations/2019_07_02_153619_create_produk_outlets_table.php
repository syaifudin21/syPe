<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdukOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk_outlets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('outlet_id');
            $table->string('nama_produk');
            $table->text('deskripsi');
            $table->string('barcode', 50);
            $table->integer('harga_beli', 10);
            $table->integer('harga_jual', 10);
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
        Schema::dropIfExists('produk_outlets');
    }
}
