<?php
declare(strict_types=1);

namespace Maddy2101\AdventOfCode2024\Day2\Part1;

/*
 * https://adventofcode.com/2024/day/2
 *
 */

class Solution3
{

    public function execute(string $fileName): int
    {
        if (file_exists($fileName) === false) {
            throw new \RuntimeException('file ' . $fileName . ' can\'t be read', 1733040376);
        }
        $handler = fopen($fileName, 'r');
        $count = 0;
        while ($line = fgets($handler)) {
            $input = array_map('intval', explode(' ', trim($line)));
            $sortAsc = $input;
            $sortDesc = $input;
            sort($sortAsc);
            rsort($sortDesc);
            if (($sortAsc !== $input) && ($sortDesc !== $input)) {
                continue;
            }
            foreach ($input as $key => $value) {
                if (array_key_exists($key + 1, $input)) {
                    $abs = abs($value - $input[$key + 1]);
                    if ($abs > 3 || $abs === 0) {
                        continue 2;
                    }
                }
            }
            $count++;
        }
        return $count;
    }
}