<?php

namespace Tests\Feature\Api;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class RetrieveBlockHeightTest extends TestCase
{
    #[Test]
    public function a_request_to_the_blockheight_api_should_return_a_200_status_code(): void
    {
        $this->get('/api/blockheight')->assertOk();
    }
}
