<?php
declare(strict_types=1);

namespace Maddy2101\AdventOfCode2024\Day1\Part1;

use PHPUnit\Framework\Exception;

/**
 * Task description: https://adventofcode.com/2024/day/1
 */
class Solution1
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
        while($line = fgets($handler)) {
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
            sort($right);
            foreach ($left as $key => $value) {
                $diff = 0;
                if ($value >= $right[$key]) {
                    $diff = $value - $right[$key];
                } else {
                    $diff = $right[$key] - $value;
                }
                $result += $diff;
            }

        return $result;
    }
}
