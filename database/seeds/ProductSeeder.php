<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = \App\Produk::create([
            'id_pemilik'    => 1,
            'id_kecamatan'  => 1,
            'panjang'       => 5,
            'lebar'         => 5,
            'foto'          => 'https://pare-apps.s3.ap-southeast-1.amazonaws.com/produk/1597756282.jpg',
            'masa_berdiri'  => '2025-07-30',
            'keterangan'    => 'oke',
            'harga_sewa'    => 250000,
            'alamat'        => 'AR hakim',
            'sisi'          => 2,
            'status'        => true,
        ]);
    }
}
