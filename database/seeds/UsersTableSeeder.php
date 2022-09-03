<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'pegawai',
            'user_role' => 'Pegawai',
            'username' => 'adminpegawai',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('qwerty'),
        ]);
        DB::table('users')->insert([
            'name' => 'Kepala-KUA',
            'user_role' => 'Kepala-KUA',
            'username' => 'kepala-kua',
            'email' => 'kepalakua@gmail.com',
            'password' => Hash::make('qwerty'),
        ]);
    }
}
