<?php

namespace Maddy2101\AdventOfCode2024\Day1\Part1;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class Solution1Test extends TestCase
{

    #[Test]
    public function NoInputFileIsReadThrowsException(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionCode(1733040376);

        (new Solution1())->execute('non-existing-file');
    }

    #[Test]
    public function distanceBetweenTwoInputsIsComputedCorrectly()
    {
        $result = (new Solution1())->execute(__DIR__ . '/testInput1.txt');
        $expected = 3;
        self::assertSame($expected, $result);
    }

    #[Test]
    public function distanceBetweenTwoInputsIsComputedCorrectlyWithCorrectSequence()
    {
        $result = (new Solution1())->execute(__DIR__ . '/testInput2.txt');
        $expected = 3;
        self::assertSame($expected, $result);
    }

    #[Test]
    public function sumOfDistances()
    {
        $result = (new Solution1())->execute(__DIR__ . '/testInput3.txt');
        $expected = 913;
        self::assertSame($expected, $result);
    }
}
