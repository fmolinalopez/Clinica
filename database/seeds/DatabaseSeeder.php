<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /**
         * Seeder que crea 20 usuarios con 10 medicos por cada uno
         */
        factory(App\User::class, 20)->create()->each(function (App\User $user){

            factory(\App\Medico::class,10)->create(['user_id' => $user->id]);

        });
    }
}
