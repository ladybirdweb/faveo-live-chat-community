<?php

namespace Tests\Unit;

use App\Models\Resetpassword;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class loginControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }


//    Test cases for Login Page


    public function test_check_if_user_can_view_the_login_page()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_check_if_user_can_view_the_login_page_with_different_method()
    {
        $response = $this->post('/');
        $response->assertStatus(405);
    }

    public function test_user_login_with_admin_credential()
    {
        $email = 'qwertyuiop@test.com';
        User::factory()->count(1)->create(['email' => $email,'role' => 'admin']);
        $user = User::where('email', $email)->first();
        $data = [
            'email' => $email,
            'password' => 'password',
        ];
        $response = $this->post('checklogin', $data);
        $response->assertStatus(302);
        $response->assertRedirect('admin');
    }

    public function test_user_login_with_agent_credential()
    {
        $email = 'xyz@test.com';
        User::factory()->count(1)->create(['email' => $email,'role' => 'agent']);
        $user = User::where('email', $email)->first();
        $data = [
            'email' => $email,
            'password' => 'password',
        ];
        $response = $this->post('checklogin', $data);
        $response->assertStatus(302);
        $response->assertRedirect('agent');
    }

    public function test_check_if_user_login_without_credentials()
    {
        $response = $this->post('checklogin', [
            'email'=> '',
            'password' => ''
        ]);
        $response->assertInvalid(['email', 'password']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_check_if_user_login_without_email()
    {
        $response = $this->post('checklogin', [
            'email'=> '',
            'password' => 'xyz'
        ]);
        $response->assertInvalid(['email']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_check_if_user_login_without_password()
    {
        $response = $this->post('checklogin', [
            'email'=> 'xyz@test.com',
            'password' => ''
        ]);
        $response->assertInvalid(['password']);
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_check_if_user_login_with_wrong_email()
    {
        $response = $this->post('checklogin', [
            'email'=> 'abc@gmail.com',
            'password' => '123'
        ]);
        $response->assertSessionHas('error', 'Incorrect Email');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_check_if_user_login_with_wrong_password()
    {
        $email = 'xyz@test.com';
        User::factory()->count(1)->create(['email' => $email]);
        $user = User::where('email', $email)->first();
        $data = [
            'email' => $email,
            'password' => '123',
        ];
        $response = $this->post('checklogin', $data);
        $response->assertSessionHas('error', 'Incorrect Password');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }


//     Test cases for Forget Password Page


    public function test_check_if_user_can_view_the_forget_password_page()
    {
        $response = $this->get('forgetpassword');
        $response->assertStatus(200);
    }

    public function test_check_if_user_can_view_the_forget_password_page_with_different_method()
    {
        $response = $this->post('forgetpassword');
        $response->assertStatus(405);
    }

    public function test_check_if_user_submit_the_forget_password_page_with_correct_email()
    {
        $email = 'kjhzkjhkjhkdhkkhtdloi@test.com';
        User::factory()->count(1)->create(['email'=> $email]);
        $user = User::where('email', $email)->first();
        $data = [
            'email'=> $email,
        ];
        $response = $this->post('checkForgetpassword', $data);
        $response->assertSessionHas('success', 'The link has been send successfully to your email');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_check_if_user_submit_the_forget_password_page_without_email()
    {
        $response = $this->post('checkForgetpassword', [
            'email'=> ''
        ]);
        $response->assertInvalid(['email']);
        $response->assertStatus(302);
    }

    public function test_check_if_user_submit_the_forget_password_page_with_wrong_email()
    {
        $response = $this->post('checkForgetpassword', [
            'email'=> 'abc@gmail.com',
        ]);
        $response->assertSessionHas('error', 'Incorrect Email');
        $response->assertStatus(302);
        $response->assertRedirect('forgetpassword');
    }


//     Test cases for Set Password Page


    public function test_check_if_user_can_view_the_set_password_page()
    {
        $response = $this->get('setpassword');
        $response->assertStatus(200);
    }

    public function test_check_if_user_can_view_the_set_password_page_with_different_method()
    {
        $response = $this->post('setpassword');
        $response->assertStatus(405);
    }

    public function test_check_if_user_set_the_password_with_correct_credential()
    {
        $email = 'test@test.com';
        User::factory()->count(1)->create(['email'=> $email,'role'=>'admin']);
        Cache::add('email', $email);
        $response = $this->post('checkSetpassword', [
            'password' => 'Meera@28',
            'confirmpassword' => 'Meera@28'
        ]);
        $response->assertStatus(302);
        $response->assertRedirect('/');
        $data = [
            'email' => $email,
            'password' => 'Meera@28',
        ];
        $response = $this->post('checklogin', $data);
        $response->assertStatus(302);
        $response->assertRedirect('admin');
    }

    public function test_check_if_user_set_the_password_without_credentials()
    {
        $response = $this->post('checkSetpassword', [
            'password' => '',
            'confirmpassword' => ''
        ]);
        $response->assertInvalid(['password', 'confirmpassword']);
        $response->assertStatus(302);
    }

    public function test_check_if_user_set_the_password_without_password()
    {
        $response = $this->post('checkSetpassword', [
            'password' => '',
            'confirmpassword' => 'Meera@28'
        ]);
        $response->assertInvalid(['password']);
        $response->assertStatus(302);
    }


    public function test_check_if_user_set_the_password_without_confirm_password()
    {
        $response = $this->post('checkSetpassword', [
            'password' => 'Meera@28',
            'confirmpassword' => ''
        ]);
        $response->assertInvalid(['confirmpassword']);
        $response->assertStatus(302);
    }

    public function test_agent_trying_to_access_admin_dashboard()
    {
        $email = 'xyz@test.com';
        User::factory()->count(1)->create(['email' => $email,'role' => 'agent']);
        $user = User::where('email', $email)->first();
        $data = [
            'email' => $email,
            'password' => 'password',
        ];
        $response = $this->post('checklogin', $data);
        $response->assertStatus(302);
        $response->assertRedirect('agent');

        $response = $this->get('admin');
        $response->assertStatus(302);
        $response->assertRedirect('agent');
    }

    public function test_admin_trying_to_access_agent_dashboard()
    {
        $email = 'xyz@test.com';
        User::factory()->count(1)->create(['email' => $email,'role' => 'admin']);
        $user = User::where('email', $email)->first();
        $data = [
            'email' => $email,
            'password' => 'password',
        ];
        $response = $this->post('checklogin', $data);
        $response->assertStatus(302);
        $response->assertRedirect('admin');

        $response = $this->get('agent');
        $response->assertStatus(302);
        $response->assertRedirect('admin');
    }

    public function test_not_loggged_in_user_tries_to_access_admin_dashboard()
    {
        $response = $this->get('admin');
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

}
