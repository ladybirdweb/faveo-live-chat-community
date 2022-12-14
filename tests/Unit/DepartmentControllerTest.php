<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Models\Department;
use App\Models\User;
use Tests\TestCase;

class DepartmentControllerTest extends TestCase
{
    public function test_addDeppartment() {
       $userId =  User::factory()->create(['role' => 'admin'])->id;
//       dd($userId);
     $user =  User::find($userId);
//     dd($user['name']);
      $response = $this->call('post','checklogin', ['email'=>$user['email'],'password' => 'password']);
//      dd($response);
//        dd($user['password']);
       $response->assertStatus(200);
//       $response->assertRedirect('/admin');
        $response = $this->post('addDepartment', ['name' => 'sales dept', 'description' => 'sales']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('departments', ['name' => 'sales dept', 'description' => 'sales']);
    }


    public function test_deleteDepartment() {
        $userId =  User::factory()->create(['role' => 'admin'])->id;
        $user =  User::find($userId);
        $response = $this->call('post','checklogin', ['email'=>$user['email'],'password' => 'password']);
        $response->assertStatus(200);

//        $departmentId = Department::factory()->create()->id;
//        $department = Department::find($departmentId);

        $response = $this->post('addDepartment', ['name' => 'sales 8', 'description' => 'sales']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('departments', ['name' => 'sales 8', 'description' => 'sales']);

        $departmentId = Department::where('name','sales 8')->pluck('id')->toArray();
//        dd($departmentId[0]);
        $response = $this->get('deleteDepartment/'.$departmentId[0]);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('departments',['name'=>'sales 8']);
    }

    public function test_editDepartmnt()
    {
        $userId =  User::factory()->create(['role' => 'admin'])->id;
        $user =  User::find($userId);
        $response = $this->call('post','checklogin', ['email'=>$user['email'],'password' => 'password']);
        $response->assertStatus(200);

        $response = $this->post('addDepartment', ['name' => 'sales 17', 'description' => 'sales desc']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('departments', ['name' => 'sales 17', 'description' => 'sales desc']);

        $departmentId = Department::where('name','sales 17')->pluck('id')->toArray();
        $response = $this->get('edit/'.$departmentId[0]);
        $department = json_decode($response->getContent())->data;
//        dd($department);
        $this->assertEquals($department->name,'sales 17');

        $response = $this->post('editDepartment', ['name' => 'updated department', 'description' => 'sales desc']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('departments', ['name' => 'updated department', 'description' => 'sales desc']);






    }


}
