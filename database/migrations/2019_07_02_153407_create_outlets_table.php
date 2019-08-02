<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ownner_id')->nullable();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('hp', 15);
            $table->text('alamat');
            $table->text('foto')->nullable();
            $table->text('ktp')->nullable();
            $table->string('service')->nullable();  //bisa dimasukkan ppn
            $table->rememberToken();
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
        Schema::dropIfExists('outlets');
    }
}
