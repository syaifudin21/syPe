<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOwnnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ownners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('hp', 15);
            $table->text('alamat');
            $table->text('foto')->nullable();
            $table->text('ktp')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('ownners');
    }
}
