<?php

namespace App\PasswordGeneratorService\Task;

use App\PasswordGeneratorService\Helper\Tools;

class NumbersTask implements Task
{
    private string $context = "0123456789";

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