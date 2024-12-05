<?php

namespace Tests\Feature;

use App\Models\Inscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ViewInscriptionPageTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_request_to_the_inscription_page_should_return_a_200_status_code(): void
    {
        Inscription::factory()->create([
            'inscription_id' => '9ad43b591e58b23d8550dfdae431432b6ea3a7079d09ef80ee1554c5a3f8d543i0',
        ]);

        $this->get('/inscription/9ad43b591e58b23d8550dfdae431432b6ea3a7079d09ef80ee1554c5a3f8d543i0')
            ->assertOk()
            ->assertViewIs('inscription');
    }

    #[Test]
    public function a_request_to_the_inscription_page_should_see_the_right_title_and_image(): void
    {
        Inscription::factory()->create([
            'inscription_id' => '1234',
            'name' => 'Pizza Ninjas #464',
        ]);

        $this->get('/inscription/1234')
            ->assertOk()
            ->assertSee(
                value: '<title>Pizza Ninjas #464 | NINJA5.pizza</title>',
                escape: false,
            )
            ->assertSee(
                value: '<meta name="twitter:image" content="https://cdn.pizza.ninja/opengraph/default/464.webp">',
                escape: false,
            );
    }
}
