<?php

namespace App\PasswordGeneratorService\Action;

use App\PasswordGeneratorService\Model\SettingModel;

interface Action
{
    public function run(SettingModel $settingModel);
}