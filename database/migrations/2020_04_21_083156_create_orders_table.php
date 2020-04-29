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
            $table->id();
            $table->integer('id_penyewa')->unsigned();
            $table->integer('id_pemilik')->unsigned();
            $table->integer('id_produk')->unsigned();
            $table->integer('harga');
            $table->integer('waktu_sewa');
            $table->integer('total_harga');
            $table->timestamps();

            $table->foreign('id_penyewa')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_pemilik')->references('id')->on('users')->onDelete('cascade');
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
