<?php

declare(strict_types=1);

namespace Tests;

use App\Calculator;
use PHPUnit\Framework\TestCase;

final class CalculatorTest extends TestCase
{
    public function test_covers_the_core_calculator_operations(): void
    {
        $calculator = new Calculator;

        self::assertSame(4, $calculator->add(2, 2));
        self::assertSame(3, $calculator->subtract(7, 4));
    }
}
