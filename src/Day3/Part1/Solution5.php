<?php
declare(strict_types=1);

namespace Maddy2101\AdventOfCode2024\Day3\Part1;

/**
 * https://adventofcode.com/2024/day/3
 */
class Solution5
{
    public function execute(string $fileName): int
    {
        if (file_exists($fileName) === false) {
            throw new \RuntimeException('file ' . $fileName . ' can\'t be read', 1733040376);
        }
        $handler = fopen($fileName, 'r');
        $input = fread($handler, filesize($fileName));
        $result = 0;
        $instructions = [];
        preg_match_all("&mul\([0-9]{1,3}\,[0-9]{1,3}\)&", $input, $instructions);

        foreach ($instructions[0] as $instruction) {
            $mul = [];
            preg_match_all("&[0-9]+&", $instruction, $mul);
            $subresult = $mul[0][0] * $mul[0][1];
            $result += $subresult;
        }
        return $result;
    }
}