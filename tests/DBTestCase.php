<?php

namespace Tests;

use App\Models\User;
use Tests\TestCase;

class DBTestCase extends TestCase
{

    protected $user;

    /**
     * A basic feature test example.
     *
     * @return void
     */
//    public function test_example()
//    {
//        $response = $this->get('/');
//        $response->assertStatus(200);
//    }

    protected function getLoggedInUserForWeb($role = 'agent')
    {
        $this->user = User::factory()->create(['role' => $role]);
        $this->be($this->user);
    }
}
