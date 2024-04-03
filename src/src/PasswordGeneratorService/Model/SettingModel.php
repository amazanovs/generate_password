<?php

namespace App\PasswordGeneratorService\Model;

class SettingModel implements Model
{
    private int $count = 0;

    private int $divider = 1;

    public function __construct(
        private readonly int $length = 8,
        public bool          $hasNumbers = false,
        public bool          $hasBigLetters = true,
        public bool          $hasSmallLetters = true,
    ) {
        $this->init();
    }

    private function init(): void
    {
        if ($this->isHasNumbers()) {
            $this->count++;
        }

        if ($this->isHasBigLetters()) {
            $this->count++;
        }

        if ($this->isHasSmallLetters()) {
            $this->count++;
        }

        if ($this->count > 0) {
            $this->divider = round($this->getLength() / $this->count);
        }
    }

    public function getLength(): string
    {
        return $this->length;
    }

    public function isHasNumbers(): bool
    {
        return $this->hasNumbers;
    }

    public function isHasBigLetters(): bool
    {
        return $this->hasBigLetters;
    }

    public function isHasSmallLetters(): bool
    {
        return $this->hasSmallLetters;
    }


    public function getDivider(): int
    {
        return $this->divider;
    }

    public function getCount(): int
    {
        return $this->count;
    }
}