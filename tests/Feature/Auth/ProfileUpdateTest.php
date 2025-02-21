<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use App\Models\User;

class ProfileUpdateTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_admin_profile_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('admin.profile'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.profile');
        $response->assertViewHas('user', $user);
    }

    /** @test */
    public function it_displays_customer_profile_page()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('customer.profile'));

        $response->assertStatus(200);
        $response->assertViewIs('customer.profile');
        $response->assertViewHas('user', $user);
    }

    /** @test */
    public function it_updates_user_profile()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $data = [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => '11111111',
            'password_confirmation' => '111111111',
        ];

        $response = $this->post(route('profile.update'), $data);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('status', 'Profil berhasil diperbarui.');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
        ]);
    }

    /** @test */
    public function it_updates_user_profile_with_photo()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        $file = UploadedFile::fake()->image('avatar.jpg');

        $data = [
            'name' => 'Updated Name',
            'email' => 'updated@example.com',
            'foto' => $file,
        ];

        $response = $this->post(route('profile.update'), $data);

        $response->assertRedirect(route('home'));
        $response->assertSessionHas('status', 'Profil berhasil diperbarui.');

        Storage::disk('public')->assertExists('users/' . $file->hashName());
    }
}
