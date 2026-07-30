<?php

declare(strict_types=1);

namespace App;

final class Calculator
{
    public function add(int $left, int $right): int
    {
        return $left + $right;
    }

    public function subtract(int $left, int $right): int
    {
        return $left - $right;
    }

    public function multiply(int $left, int $right): int
    {
        return $left * $right;
    }

    public function divide(int $left, int $right): int
    {
        return intdiv($left, $right);
    }

    public function maximum(int $left, int $right): int
    {
        return max($left, $right);
    }
}
