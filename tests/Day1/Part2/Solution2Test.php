<?php

namespace Maddy2101\AdventOfCode2024\Day1\Part2;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Solution2Test extends TestCase
{

    #[Test]
    public function NoInputFileIsReadThrowsException(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionCode(1733040376);

        (new Solution2())->execute('non-existing-file');
    }

    #[Test]
    public function distanceBetweenTwoInputsIsComputedCorrectly()
    {
        $result = (new Solution2())->execute(__DIR__ . '/testInput1.txt');
        $expected = 504;
        self::assertSame($expected, $result);
    }

}
