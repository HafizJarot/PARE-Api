<?php

use Illuminate\Database\Seeder;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\User::create([
            'email'                 => 'wicaksono@gmail.com',
            'email_verified_at'     => now(),
            'password'              => \Illuminate\Support\Facades\Hash::make('12345678'),
            'role'                  => true,
            'api_token'             => 'token wicaksono',
            'status'                => true
        ]);

        \App\Pemilik::create([
           'id_user' => $user->id,
            'no_izin' => '12345',
            'nama_perusahaan' => 'wicaksono',
            'alamat' => 'tegal'
        ]);
    }
}
