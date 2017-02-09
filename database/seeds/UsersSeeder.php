<?php

use App\Problem;
use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = factory(App\User::class)->create([
            'email'=>'admin@example.com',
            'password' => bcrypt('admindemo')
        ]);

        $userBegginer = factory(App\User::class)->create([
            'email'=>'begginer@example.com',
            'password' => bcrypt('begginerdemo')
        ]);

        $problems = Problem::take(10)->get();
        $userBegginer->solve($problems[0],$problems[0]->answer);

    }
}
