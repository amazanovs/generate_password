<?php
namespace App\PasswordGeneratorService;

use App\PasswordGeneratorService\Action\GeneratePasswordAction;
use App\PasswordGeneratorService\Model\SettingModel;
use App\PasswordGeneratorService\Validator\SettingValidator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

class PasswordGeneratorController extends AbstractController
{
    public function __construct(
        private readonly GeneratePasswordAction $generatePasswordAction,
        private readonly SettingValidator $settingValidator
    ) {
    }

    #[Route('/', name: 'index', methods: 'get')]
    public function index(): Response
    {
        return $this->render('layout.html.twig');
    }

    #[Route('/manager', name: 'manager', methods: ['post'] )]
    public function webFlow(#[MapRequestPayload] SettingModel $setting): JsonResponse
    {
        if ($this->settingValidator->validate($setting)) {
            $message = $this->runFlow($setting);
        } else {
            $message = $this->settingValidator->getMessage();
        }

        return $this->json(['password' => $message]);
    }

    public function consoleFlow(int $length): string
    {
        $setting = new SettingModel(length: $length);

        return $this->runFlow($setting);
    }

    private function runFlow(SettingModel $setting): string
    {
        return $this->generatePasswordAction->run($setting);
    }
}