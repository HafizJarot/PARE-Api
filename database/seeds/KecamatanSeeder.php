<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['Tegal Timur', 'Tegal Barat', 'Tegal Selatan', 'Margadana'];
        for ($i = 0; $i < count($arr); $i++){
            \App\Kecamatan::create([
                'kecamatan' => $arr[$i]
            ]);
        }
    }
}
