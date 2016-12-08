<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegistrationFormNoCaptchaTest extends TestCase
{

    /**
     * @test Recaptcha field is required
     *
     * @return void
     */
    public function nocaptcha_is_required()
    {

    }
}
