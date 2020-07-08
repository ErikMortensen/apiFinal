<?php

Use App\User;
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
        // $this->call(UserSeeder::class);

        User::truncate();

        $cantidadUsuarios = 100;

        factory(User::class, $cantidadUsuarios)->create();
    }
}
