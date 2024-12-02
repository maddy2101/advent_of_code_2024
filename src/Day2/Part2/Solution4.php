<?php
declare(strict_types=1);

namespace Maddy2101\AdventOfCode2024\Day2\Part2;

/*
 * https://adventofcode.com/2024/day/2#part2
 *
 * nasty. Tests are green, all seems good, but my answer is not accepted. Givin' up here.
 *
 */

class Solution4
{

    private $corrected = 0;

    public function execute(string $fileName): int
    {
        if (file_exists($fileName) === false) {
            throw new \RuntimeException('file ' . $fileName . ' can\'t be read', 1733040376);
        }
        $handler = fopen($fileName, 'r');
        $count = 0;
        while ($line = fgets($handler)) {
            $input = array_map('intval', explode(' ', trim($line)));
            $this->corrected = 0;
            $checkedInput = $this->checkSequenceWrapper($input);
            if ($checkedInput === []) {
                continue;
            }
            if ($checkedInput !== $input) {
                $this->corrected = 1;
            }
            if ($this->checkDistanceWrapper($checkedInput) === false) {
                continue;
            }
            $count++;
        }
        return $count;
    }

    protected function checkSequenceWrapper(array $input): array
    {
        // original, nothing tried to correct, it just works
        if ($this->checkSequence($input) === true) {
            return $input;
        }
        foreach ($input as $key => $_) {
            $try = $input;
            unset($try[$key]);
            $try = array_values($try);
            if ($this->checkSequence($try) === true) {
                return $try;

            }
        }
        return [];
    }

    protected function checkSequence(array $input): bool
    {
        $sortAsc = $input;
        $sortDesc = $input;
        sort($sortAsc);
        rsort($sortDesc);
        if (($sortAsc !== $input) && ($sortDesc !== $input)) {
            return false;
        }
        return true;
    }

    private function checkDistanceWrapper(array $input): bool
    {
        if ($this->checkDistance($input) === true) {
            return true;
        }
        // only makes sense if we can still correct once
        if ($this->corrected === 0) {
            foreach ($input as $key => $_) {
                $try = $input;
                unset($try[$key]);
                $try = array_values($try);
                if ($this->checkDistance($try) === true) {
                    return true;
                }
            }
        }
        return false;

    }

    private function checkDistance(array $input): bool
    {
        foreach ($input as $key => $value) {
            if (array_key_exists($key + 1, $input)) {
                $abs = abs($value - $input[$key + 1]);
                if ($abs > 3 || $abs === 0) {
                    return false;
                }
            }
        }
        return true;
    }
}