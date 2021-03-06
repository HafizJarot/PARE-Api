<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pemilik')->unsigned();
            $table->bigInteger('id_kecamatan')->unsigned();
            $table->integer('panjang');
            $table->integer('lebar');
            $table->string('foto');
            $table->date('masa_berdiri');
            $table->text('keterangan');
            $table->integer('harga_sewa');
            $table->string('alamat', 100);
            $table->integer('sisi');
            $table->boolean('status')->default(false);
            $table->timestamps();

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
        Schema::dropIfExists('produks');
    }
}
