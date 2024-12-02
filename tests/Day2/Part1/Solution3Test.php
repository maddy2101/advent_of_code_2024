<?php
declare(strict_types=1);

namespace Day2\Part1;

use Maddy2101\AdventOfCode2024\Day2\Part1\Solution3;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Solution3Test extends TestCase
{
    #[Test]
    public function numbersNotIncreasingOrDecreasing()
    {
        $result = (new Solution3())->execute(__DIR__ . '/testInput1.txt');
        self::assertSame(0, $result);
    }

    #[Test]
    public function differenceLargerThan3IsDetected()
    {
        $result = (new Solution3())->execute(__DIR__ . '/testInput2.txt');
        self::assertSame(0, $result);
    }

    #[Test]
    public function differenceSmallerThan1IsDetected()
    {
        $result = (new Solution3())->execute(__DIR__ . '/testInput3.txt');
        self::assertSame(0, $result);
    }

}