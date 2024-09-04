<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    #[Test]
    public function test_that_true_is_true(): void
    {
        $this->assertTrue(true);
    }
}
