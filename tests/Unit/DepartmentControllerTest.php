<?php

namespace Tests\Unit;

use App\Models\Department;
use Tests\DBTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DepartmentControllerTest extends DBTestCase
{
    use RefreshDatabase;

    public function test_addDeppartment()
    {
        $this->getLoggedInUserForWeb('admin');
        $response = $this->post('addDepartment', ['name' => 'hii', 'description' => 'hii']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('departments', ['name' => 'hii', 'description' => 'hii']);
    }

    public function test_deleteDepartment()
    {
        $this->getLoggedInUserForWeb('admin');
        $response = $this->post('addDepartment', ['name' => 'sales 8', 'description' => 'sales']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('departments', ['name' => 'sales 8', 'description' => 'sales']);
        $departmentId = Department::where('name','sales 8')->pluck('id')->toArray();
        $response = $this->get('deleteDepartment/'.$departmentId[0]);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('departments',['name'=>'sales 8']);
    }

    public function test_editDepartmnt()
    {
        $this->getLoggedInUserForWeb('admin');
        $response = $this->post('addDepartment', ['name' => 'sales 17', 'description' => 'sales desc']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('departments', ['name' => 'sales 17', 'description' => 'sales desc']);
        $departmentId = Department::where('name','sales 17')->pluck('id')->toArray();
        $response = $this->get('edit/'.$departmentId[0]);
        $department = json_decode($response->getContent())->data;
        $this->assertEquals($department->name,'sales 17');
        $response = $this->post('editDepartment', ['name' => 'updated department', 'description' => 'sales desc']);
        $response->assertStatus(200);
        $this->assertDatabaseHas('departments', ['name' => 'updated department', 'description' => 'sales desc']);
    }

}
