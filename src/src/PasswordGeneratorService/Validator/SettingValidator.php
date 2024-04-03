<?php

namespace App\PasswordGeneratorService\Validator;

use App\PasswordGeneratorService\Model\Model;

class SettingValidator
{
    private const MINIMAL_MAXIMAL_SYMBOLS = 'Minimal of symbols 4, maximal is 16.';

    private const NOT_SELECTED_FROM_WHICH_GENERATE = 'Error, please select from which you are want generate password.';

    private string $message;

    public function validate(Model $model): bool
    {
        if ($model->getLength() < 4 || $model->getLength() > 16) {
            $this->setMessage(self::MINIMAL_MAXIMAL_SYMBOLS);

            return false;
        }

        if ($model->getCount() === 0) {
            $this->setMessage(self::NOT_SELECTED_FROM_WHICH_GENERATE);

            return false;
        }

        return true;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    private function setMessage(string $message): void
    {
        $this->message = $message;
    }
}