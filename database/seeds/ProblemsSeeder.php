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
                'title' => 'TEST',
                'level' => 'low', // low / medium / hard
                'answer' => 'test', // integer or text
                'score' => 100, // low - 5 / medium - 10 / hard - 15
                'description' => 'test',
            ],
            [
                'title' => 'TEST2',
                'level' => 'medium', // low / medium / hard
                'answer' => 'test', // integer or text
                'score' => 100, // low - 5 / medium - 10 / hard - 15
                'description' => 'test',
            ]
        ];

        DB::table('problems')->insert($problems);
    }
}
