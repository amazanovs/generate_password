<?php

namespace App\PasswordGeneratorService\Task;

use App\PasswordGeneratorService\Helper\Tools;

class BigLettersTask implements Task
{
    private int $length = 26;

    private string $context = "ABCDEFGHIJKLMNOPQRSTUWXYZ";

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