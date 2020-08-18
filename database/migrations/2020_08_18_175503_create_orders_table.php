<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_penyewa')->unsigned();
            $table->integer('id_pemilik')->unsigned();
            $table->integer('id_produk')->unsigned();
            $table->date('tanggal_mulai_sewa');
            $table->date('tanggal_selesai_sewa');
            $table->integer('harga');
            $table->integer('total_harga');
            $table->string('status')->default('pending');
            $table->string('snap')->nullable();
            $table->timestamps();

            $table->foreign('id_penyewa')->references('id')->on('penyewas')->onDelete('cascade');
            $table->foreign('id_pemilik')->references('id')->on('pemiliks')->onDelete('cascade');
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
