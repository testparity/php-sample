<?php

declare(strict_types=1);

namespace Tests;

use App\Calculator;
use App\DiscountPolicy;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DiscountPolicy::class)]
#[CoversClass(Calculator::class)]
final class DiscountPolicyTest extends TestCase
{
    public function testAppliesStandardDiscount(): void
    {
        $calculator = new Calculator;
        $subtotal = $calculator->multiply(20, 5);

        self::assertSame(50, $calculator->divide($subtotal, 2));
        self::assertSame(90.0, (new DiscountPolicy())->apply((float) $subtotal));
    }
}
