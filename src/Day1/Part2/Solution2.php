<?php
declare(strict_types=1);

namespace Maddy2101\AdventOfCode2024\Day1\Part2;

/**
 * Task description: https://adventofcode.com/2024/day/1#part2
 */
class Solution2
{

    public function execute(string $fileName): int
    {
        if (file_exists($fileName) === false) {
            throw new \RuntimeException('file ' . $fileName . ' can\'t be read', 1733040376);
        }
        $handler = fopen($fileName, 'r');
        $result = 0;
        $left = [];
        $right = [];
        while ($line = fgets($handler)) {
            $inputs = explode(' ', $line);
            foreach ($inputs as $key => $value) {
                if ($value === '') {
                    continue;
                }
                if (intval($value) >= 0) {
                    if ($key === 0) {
                        $left[] = (int)$value;
                    } else {
                        $right[] = (int)$value;
                    }
                }
            }
        }
        sort($left);
        $right = array_count_values($right);
        foreach ($left as $value) {
            $score = $value * ($right[$value] ?? 0);
            $result += $score;
        }

        return $result;
    }
}
