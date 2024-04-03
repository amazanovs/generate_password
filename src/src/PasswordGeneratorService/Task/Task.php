<?php

namespace App\PasswordGeneratorService\Task;

interface Task
{
    public function run(): array;
}