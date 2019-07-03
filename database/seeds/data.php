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
    }
}
