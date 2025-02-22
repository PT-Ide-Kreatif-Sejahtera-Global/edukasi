<?php

namespace Tests\Unit;

use App\Models\User;
use App\Models\cupon;
use App\Models\course;
use App\Models\Enrollments;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminTest extends TestCase
{

    /**
     * A basic unit test example.
     */
    public function test_admin_can_view_payment_list()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/payment');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_course()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/course');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_content()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/content');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_kategori()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/section');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_data_user()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/user');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_data_instructor()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/instructor');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_data_rating()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/rating');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_data_coupon()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/coupon');

        $response->assertStatus(200);
    }
<<<<<<< HEAD
=======

    public function test_admin_can_view_home()
    {
        $admin = User::where('role', 'admin')->first();

        $this->assertNotNull($admin, "Admin tidak ditemukan di database");

        $this->actingAs($admin);

        $response = $this->get('/home');

        $response->assertStatus(200);
    }

    public function test_admin_can_logout()
    {
        $admin = User::where('role', 'admin')->first();

        $this->actingAs($admin);

        $response = $this->post('/logout');

        $response->assertRedirect('/');

        $this->assertGuest();
    }
>>>>>>> update
}
