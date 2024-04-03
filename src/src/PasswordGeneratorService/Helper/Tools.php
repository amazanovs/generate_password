<?php

namespace App\PasswordGeneratorService\Helper;

use Random\Randomizer;

class Tools
{
    public function shuffleArray(array $data, int $howMany = 1): array
    {
        $randomizer = new Randomizer();

        if ($howMany !== 1) {
            for ($i = 1; $i <= $howMany; $i++) {
                $data = $randomizer->shuffleArray($data);
            }

            return $data;
        }

        return $randomizer->shuffleArray($data);
    }

    public function randomArray(array $data, int $howMany): array
    {
        return array_rand($data, $howMany);
    }

    public function sliceArray(array $data, int $length = 3): array
    {
        return array_slice($data, 0, $length);
    }

    public function implodeArray(array $data, string $del = ''): string
    {
        return implode($del, $data);
    }

    public function mergeArray(array $array1, array $array2): array
    {
        return array_merge($array1, $array2);
    }
}