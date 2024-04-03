<?php

namespace App\PasswordGeneratorService\Task;

use App\PasswordGeneratorService\Helper\Tools;

class SmallLettersTask implements Task
{
    private string $context = "abcdefghijklmnopqrstuvwxyz";

    private array $arrayContext;

    public function __construct(
        private readonly Tools $tools
    ) {
        $this->arrayContext = str_split($this->context);
    }

    public function run(): array
    {
        return $this->tools->shuffleArray($this->arrayContext);
    }
}