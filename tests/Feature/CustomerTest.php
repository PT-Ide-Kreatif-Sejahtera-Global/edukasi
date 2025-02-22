<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\course;
use App\Models\Enrollments;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_admin_can_view_customer_home_page()
    {
        $customer = User::where('role', 'customer')->first();

        $this->assertNotNull($customer, "Customer tidak ditemukan di database");

        $this->actingAs($customer);

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_profile()
    {
        $customer = User::where('role', 'customer')->first();

        $this->assertNotNull($customer, "Customer tidak ditemukan di database");

        $this->actingAs($customer);

        $response = $this->get('/profileuser');

        $response->assertStatus(200);
    }

    public function test_admin_can_view_customer_paymentlist()
    {
        $customer = User::where('role', 'customer')->first();

        $this->assertNotNull($customer, "Customer tidak ditemukan di database");

        $this->actingAs($customer);

        $response = $this->get('/customer/payments');

        $response->assertStatus(200);
    }

    public function test_customer_can_logout()
    {
        $customer = User::factory()->create(['role' => 'customer']);

        $this->actingAs($customer);

        $response = $this->post('/logout');

        $response->assertRedirect('/'); 
        
        $this->assertGuest(); 
    }

    public function test_customer_can_access_course_detail()
    {
        $customer = User::where('role', 'customer')->first();

        $this->assertNotNull($customer, "Customer tidak ditemukan di database");

        $course = course::first();

        $this->assertNotNull($course, "Course tidak ditemukan di database");

        $this->actingAs($customer);

        $response = $this->get("/detail{$course->id}");

        $response->assertStatus(200);
    }

    public function test_customer_can_access_course_payment_detail_page()
    {
        $customer = User::where('role', 'customer')->first();

        $this->assertNotNull($customer, "Customer tidak ditemukan di database");

        $course = Course::first();

        $this->assertNotNull($course, "Course tidak ditemukan di database");

        $this->actingAs($customer);

        $existingEnrollment = Enrollments::where('user_id', $customer->id)
            ->where('course_id', $course->id)
            ->where('payment_status', 'pending')
            ->first();

        if ($existingEnrollment) {
        
            $response = $this->get("/pembayaran{$course->id}");
            $response->assertRedirect(route('paymentCourse', ['order_id' => $existingEnrollment->order_id]));
        } else {
        
            $response = $this->get("/pembayaran{$course->id}");
            $response->assertStatus(200);
        }
    }

    public function test_customer_can_continue_to_payment()
    {
        $customer = User::where('role', 'customer')->first();

        $this->assertNotNull($customer, "Customer tidak ditemukan di database");

        $enrollment = Enrollments::where('payment_status', 'pending')->first();

        $this->assertNotNull($enrollment, "Enrollment dengan status pending tidak ditemukan di database");

        $this->actingAs($customer);

        $response = $this->get("/customer/payment/course/{$enrollment->order_id}");

        $response->assertStatus(200);
    }
}
