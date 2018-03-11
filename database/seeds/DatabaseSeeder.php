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

        $users = factory(App\User::class, 20)->create();

        $clinicas = factory(App\Clinica::class, 10)->create();

        $users->each(function (App\User $user) use ($users, $clinicas) {
            if ($user->esMedico) {
                $user->clinicas()->sync(
                    $clinicas->random(mt_rand(1, 5))
                );
            }
        });
    }
}
