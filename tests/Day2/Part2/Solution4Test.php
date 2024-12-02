<?php
declare(strict_types=1);

namespace Day2\Part2;

use Maddy2101\AdventOfCode2024\Day2\Part2\Solution4;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Solution4Test extends TestCase
{
    #[Test]
    public function checkInput()
    {
        $result = (new Solution4())->execute(__DIR__ . '/testInput1.txt');
        $this->assertSame(22, $result);
    }
}