<?php

use Illuminate\Database\Seeder;

class ProblemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $problems = [
            [
                'title' => '',
                'level' => 'low', // low / medium / hard
                'answer' => 0, // integer or text
                'score' => 0, // low - 5 / medium - 10 / hard - 15
                'description' => '',
            ]
        ];
    }
}
