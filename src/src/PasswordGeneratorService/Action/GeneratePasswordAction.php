<?php

namespace App\PasswordGeneratorService\Action;

use App\PasswordGeneratorService\
{
    Collection\PasswordElementCollection,
    Model\SettingModel,
    Task\BigLettersTask,
    Task\NumbersTask,
    Task\SmallLettersTask
};

readonly class GeneratePasswordAction
{
    public function __construct(
        private BigLettersTask            $bigLettersTask,
        private NumbersTask               $numbersTask,
        private SmallLettersTask          $smallLettersTask,
        private PasswordElementCollection $passwordElementCollection,
    ) {
    }

    public function run(SettingModel $settingModel): string
    {
        if ($settingModel->isHasNumbers()) {
            $this->passwordElementCollection->push(
                $this->numbersTask->run(),
                $settingModel->getDivider()
            );
        }

        if ($settingModel->isHasSmallLetters()) {
            $this->passwordElementCollection->push(
                $this->smallLettersTask->run(),
                $settingModel->getDivider()
            );
        }

        if ($settingModel->isHasBigLetters()) {
            $this->passwordElementCollection->push(
                $this->bigLettersTask->run(),
                $settingModel->getDivider()
            );
        }

        return $this->passwordElementCollection->output(
            $settingModel->getLength()
        );
    }
}