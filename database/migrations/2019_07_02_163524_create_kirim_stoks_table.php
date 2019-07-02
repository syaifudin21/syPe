<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKirimStoksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kirim_stoks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ownner_id');
            $table->integer('outlet_id');
            $table->text('produk');
            $table->integer('tagihan', 10);
            $table->enum('status', ['Permintaan', 'Konfirmasi', 'Dikirim','Sampai']);
            $table->text('keterangan');
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
        Schema::dropIfExists('kirim_stoks');
    }
}
