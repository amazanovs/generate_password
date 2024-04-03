<?php

namespace App\PasswordGeneratorService\Collection;

use App\PasswordGeneratorService\Helper\Tools;

class PasswordElementCollection
{
    public array $data = [];

    private int $shuffle = 99;

    public function __construct(private readonly Tools $tools)
    {
    }

    public function push(array $data, int $slice = 0): self
    {
        $this->data = $this->tools->mergeArray(
            $this->data,
            $this->tools->sliceArray($data, $slice)
        );

        return $this;
    }

    public function output(int $length): string
    {
        $data = $this->tools->sliceArray(
            $this->tools->shuffleArray($this->data, $this->shuffle),
            $length
        );

        return $this->tools->implodeArray($data);
    }
}