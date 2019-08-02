<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokProdukOwnnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_produk_ownners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('produk_id');
            $table->integer('stok_awal');
            $table->integer('debit')->nullable();
            $table->integer('kredit')->nullable();
            $table->integer('stok_akhir');
            $table->integer('invoice')->nullable();
            $table->json('keterangan');
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
        Schema::dropIfExists('stok_produk_ownners');
    }
}
