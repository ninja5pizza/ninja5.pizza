<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class NinjaNumberRedirectTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function redirect_pizza_ninja_number(): void
    {
        $this->get('/1')
            ->assertStatus(301)
            ->assertRedirect('/pizza-ninjas/1');

        $this->get('/1499')
            ->assertStatus(301)
            ->assertRedirect('/pizza-ninjas/1499');
    }
}
