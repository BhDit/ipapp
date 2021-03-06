<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Exceptions\Problem\IncorrectAnswer;

class UserProblemSolvingTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test User can resolve problem
     *
     * @return void
     */
    public function user_can_solve_problem_with_correct_answer()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
        $problem = factory(App\Problem::class)->create();
        $answer = $problem->answer; // $request->input('answer')

        $user->solve($problem,$answer);

        $this->seeInDatabase('answers', [
            'user_id' => $user->id,
            'problem_id' => $problem->id
        ]);
    }

    /**
     * @test User can resolve problem
     *
     * @trows IncorrectAnswer
     * @return void
     */
    public function user_cant_solve_problem_with_incorrect_answer()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);

        $problem = factory(App\Problem::class)->create();
        $answer = 'pupu'; // $request->input('answer')

        $this->expectException(IncorrectAnswer::class);
        $user->solve($problem,$answer);

        $this->notSeeInDatabase('answers', [
            'user_id' => $user->id,
            'problem_id' => $problem->id
        ]);
    }

    /**
     * @test Unit Test Problem::isSolvedBy()
     */
    public function problem_solved_by_user()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);

        $problem = factory(App\Problem::class)->create();
        $answer = $problem->answer; // $request->input('answer')

        $user->solve($problem,$answer);

        $this->assertTrue($problem->isSolvedBy($user));
    }

    /**
     * @test
     */
    public function user_cheated_on_problem()
    {
        $user = factory(App\User::class)->create();
        $user->points = 100;
        $user->save();
        $this->actingAs($user);

        $problem = factory(App\Problem::class)->create();

        $user->cheatOn($problem);

        $this->assertTrue($user->points == 100 - IPAPP::$cheatPoints);
    }
}
