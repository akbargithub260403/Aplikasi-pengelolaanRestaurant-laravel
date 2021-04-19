<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Ferdinan',
            'email'     => 'ferdinan@gmail.com',
            'role'      => 'Administrator',
            'password'  => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name'      => 'Tresna',
            'email'     => 'tresna@gmail.com',
            'role'      => 'Owner',
            'password'  => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name'      => 'Ikhsan',
            'email'     => 'ikhsan@gmail.com',
            'role'      => 'Kasir',
            'password'  => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name'      => 'Regi',
            'email'     => 'regi@gmail.com',
            'role'      => 'Waiter',
            'password'  => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name'      => 'Sanjaya',
            'email'     => 'sanjaya@gmail.com',
            'role'      => 'Pelanggan',
            'password'  => Hash::make('12345678'),
        ]);

        DB::table('daftarmenu')->insert([
            'nama_menu' => 'Ayam Bakar mang Ujo',
            'harga'     => '50000',
            'gambar'    => '1601940776_ayam bakar.jpg',
            'keterangan'=> 'ayam bakar biasa'
        ]);

        DB::table('paketmenu')->insert([
            'kode_paket'    => '90129012',
            'nama_paket'    => 'Paket Murah Meriah',
            'nama_menu1'    => 'bubur ayam',
            'nama_menu2'    => 'teh manis',
            'nama_menu3'    => 'kerupuk udang',
            'harga_paket'   => '25000',
            'gambar'        => '1602458452_bubur ayam.jpg',
            'keterangan'    => 'cuma bubur ayam biasa'
        ]);

        DB::table('pesanan')->insert([
            'kode_pesanan'  => '1920192',
            'nama_pemesan'  => 'Sanjaya',
            'nama_pesanan'  => 'bebek bakar mang ujo',
            'harga_pesanan' => '100000',
            'jumlah_pesanan'=> '2',
            'email_pemesan' => 'sanjaya@gmail.com'
        ]);
        // $this->call(UserSeeder::class);
    }
}
