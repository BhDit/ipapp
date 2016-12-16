<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserDataActionsTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @test User can create account
     *
     */
    public function user_can_create_account()
    {

    }
    /**
     * @test User can edit his data.
     *
     * @return void
     */
    public function user_can_edit_his_data()
    {
        $user = factory(App\User::class)->create();
        $this->actingAs($user);
        $this->visit('/profile/edit')
            ->assertResponseStatus(200);
    }
}
