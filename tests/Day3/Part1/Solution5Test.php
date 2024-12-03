<?php
declare(strict_types=1);

namespace Day3\Part1;

use Maddy2101\AdventOfCode2024\Day3\Part1\Solution5;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Solution5Test extends TestCase
{
    #[Test]
    public function regexFindsInstructions()
    {
        $result = (new Solution5())->execute(__DIR__ . '/testInput1.txt');
        $expected = 1041;

        self::assertEquals($expected, $result);
    }

}