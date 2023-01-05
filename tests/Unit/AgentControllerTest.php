<?php

namespace Tests\Unit;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DBTestCase;

class AgentControllerTest extends DBTestCase
{
    use RefreshDatabase;

    public function test_addAgents()
    {
        $this->getLoggedInUserForWeb('admin');
        $departmentId = Department::factory()->create()->id;
        $response = $this->post('addAgents', ['username' => 'xyz', 'email' => 'xyz@test.com', 'password' => 'xyz@123', 'confirmpassword' => 'xyz@123', 'departments' => $departmentId]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['name' => 'xyz', 'email' => 'xyz@test.com']);
        $userId = User::where('email', 'xyz@test.com')->pluck('id')->toArray();
        $this->assertDatabaseHas('user_assign_departments', ['user_id' => $userId[0], 'department_id' => $departmentId]);
    }

    public function test_deleteAgent()
    {
        $this->getLoggedInUserForWeb('admin');
        $departmentId = Department::factory()->create()->id;
        $response = $this->post('addAgents', ['username' => 'xyz', 'email' => 'xyz@test.com', 'password' => 'xyz@123', 'confirmpassword' => 'xyz@123', 'departments' => $departmentId]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['name' => 'xyz', 'email' => 'xyz@test.com']);
        $userId = User::where('email', 'xyz@test.com')->pluck('id')->toArray();
        $response = $this->get('deleteUser/'.$userId[0]);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('users', ['name'=>'xyz']);
    }

    public function test_editAgent()
    {
        $this->getLoggedInUserForWeb('admin');
        $departmentId = Department::factory()->create()->id;
        $response = $this->post('addAgents', ['username' => 'xyz', 'email' => 'xyz@test.com', 'password' => 'xyz@123', 'confirmpassword' => 'xyz@123', 'departments' => $departmentId]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['name' => 'xyz', 'email' => 'xyz@test.com']);
        $userId = User::where('email', 'xyz@test.com')->pluck('id')->toArray();
        $response = $this->get('editUser/'.$userId[0]);
        $user = json_decode($response->getContent())->data;
        $this->assertEquals($user[0]->name, 'xyz');
        $response = $this->post('updateAgents', ['username' => 'abc', 'department_name' => $departmentId, 'id'=> $userId[0]]);
        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['name' => 'abc', 'email' => 'xyz@test.com']);
    }
}
