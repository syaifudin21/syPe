<?php

use Illuminate\Database\Seeder;

class data extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('121212'),
        ]);
        DB::table('ownners')->insert([
            'nama' => 'Ownner',
            'username' => 'ownner',
            'hp' => '01291291201',
            'alamat' => 'alamat ownner',
            'password' => bcrypt('121212'),
        ]);
        DB::table('outlets')->insert([
            'ownner_id' => 1,
            'nama' => 'Outlet',
            'username' => 'outlet',
            'hp' => '01291291201',
            'alamat' => 'alamat outlet',
            'password' => bcrypt('121212'),
        ]);
        DB::table('outlets')->insert([
            'ownner_id' => NULL,
            'nama' => 'Outlet TO',
            'username' => 'outlet2',
            'hp' => '01291291201',
            'alamat' => 'alamat outlet tanpa ownner',
            'password' => bcrypt('121212'),
        ]);
    }
}
