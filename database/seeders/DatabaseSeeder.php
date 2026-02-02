<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::create([
            'nama'      => 'Akun Admin',
            'email'     => 'admin@bca.co.id',
            'tgl_lahir' => '2000-01-01',
            'alamat'    => 'Jl. Admin',
            'no_hp'     => '087847487197',
            'password'  => '123123',
            'jabatan'   => 'Admin',
        ]);

        User::create([
            'nama'      => 'Akun Karyawan',
            'email'     => 'karyawan@bca.co.id',
            'tgl_lahir' => '2000-01-01',
            'alamat'    => 'Jl. karyawan',
            'no_hp'     => '087847487197',
            'password'  => 'karyawanbca',
            'jabatan'   => 'Staff',
        ]);

        User::create([
            'nama'      => 'Uji Coba',
            'email'     => 'test@bca.co.id',
            'tgl_lahir' => '2000-01-01',
            'alamat'    => 'Jl. karyawan',
            'no_hp'     => '087847487197',
            'password'  => 'testbca',
            'jabatan'   => 'Staff',
        ]);
    }
}
