<?php

namespace Tests\Feature;

use App\Models\Inscription;
use App\Models\OrdinalsCollection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ViewCollectionPageTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function a_request_to_the_collection_page_should_return_a_200_status_code(): void
    {
        $this->get('/collection')->assertOk()->assertViewIs('collection');
    }

    #[Test]
    public function only_inscriptions_from_pizza_ninjas_collection_are_shown(): void
    {
        $pizzaNinjasCollection = OrdinalsCollection::factory()->create([
            'slug' => 'pizza-ninjas',
        ]);

        $pizzaNinjasInscription = Inscription::factory()->create([
            'collection_id' => $pizzaNinjasCollection->id,
            'name' => 'Pizza Ninjas #1',
        ]);

        $otherCollection = OrdinalsCollection::factory()->create([
            'slug' => 'some-other-collection',
        ]);

        $otherInscription = Inscription::factory()->create([
            'collection_id' => $otherCollection->id,
            'name' => 'Other Collection Item',
        ]);

        $response = $this->get('/collection');

        $response->assertOk();
        $response->assertSee($pizzaNinjasInscription->name);
        $response->assertDontSee($otherInscription->name);
    }
}
