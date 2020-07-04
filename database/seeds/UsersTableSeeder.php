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
            'name' => 'Erik Mortensen',
            'email' => 'erik@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
