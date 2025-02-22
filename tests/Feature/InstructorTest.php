<?php

namespace Tests\Feature;

use App\Models\Enrollments;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InstructorTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_instructor_can_view_home_page(): void
    { 
        $instructor = User::where('role', 'instructor')->first();

        $this->assertNotNull($instructor, "Customer tidak ditemukan di database");

        $this->actingAs($instructor);

        $response = $this->get('/home');

        $response->assertStatus(200);
    }

    public function test_instructor_can_view_courses_page(): void
    { 
        
        $instructor = User::where('role', 'instructor')->first();

        $this->assertNotNull($instructor, "Customer tidak ditemukan di database");

        $this->actingAs($instructor);

        $response = $this->get('/courses');

        $response->assertStatus(200);
        
    }

    public function test_instructor_can_view_students_page(): void
    { 
        
        $instructor = User::where('role', 'instructor')->first();

        $this->assertNotNull($instructor, "Customer tidak ditemukan di database");
        
        $this->actingAs($instructor);

        $response = $this->get('/students1');

        $response->assertStatus(200);
        
    }

    public function test_instructor_can_logout()
    {
        $customer = User::factory()->create(['role' => 'instructor']);

        $this->actingAs($customer);

        $response = $this->post('/logout');

        $response->assertRedirect('/');

        $this->assertGuest();
    }
}
