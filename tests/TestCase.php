<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;
    use CreatesApplication;

    protected function signIn($user = null){
        $user = $user ?: create('App\Models\User');

        $this->actingAs($user);

        return $this;
    }
}
