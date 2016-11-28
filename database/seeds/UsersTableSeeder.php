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
            'name' => 'novan',
            'email' => 'project@novan.com',
            'password' => bcrypt('123123'),
            'level' => 3,
            'active' => true,
        ]);
    }
}
