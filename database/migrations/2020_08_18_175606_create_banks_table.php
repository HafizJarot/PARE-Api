<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik')->unsigned();
            $table->double('saldo')->default(0);
            $table->string('nama_bank', 10)->nullable();
            $table->string('nomor_rekening', 16)->nullable();
            $table->string('nama_rekening', 50)->nullable();

            $table->foreign('id_pemilik')->references('id')->on('pemiliks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
