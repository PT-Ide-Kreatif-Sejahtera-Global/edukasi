<?php

namespace Tests\Unit;

use Tests\TestCase;

class UnauthTest extends TestCase
{
    /**
     * Test apakah home page bisa diakses.
     */
    public function test_home_page_is_render(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('IdeaThings - E-Learning');
    }

    public function test_login_page_is_render(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);

        $response->assertSee('Login | IdeaThings');
    }
  
    public function test_register_page_is_render(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);

        $response->assertSee('Register | IdeaThings');
    }
}
