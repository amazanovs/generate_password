<?php

namespace App\PasswordGeneratorService\Command;

use App\PasswordGeneratorService\PasswordGeneratorController;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'generate:password')]
class PasswordGeneratorCommand extends Command
{
    public function __construct(
        private readonly PasswordGeneratorController $passwordGeneratorController
    ) {
        parent::__construct();
    }
    protected function configure(): void
    {
        $this
            ->setDescription('Generate password')
            ->setHelp('This command generate password')
            ->addArgument('length', InputArgument::REQUIRED, 'Password length')
        ;
    }
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $length = $input->getArgument('length');

        $message = $this->passwordGeneratorController->consoleFlow($length);

        $output->writeln($message);

        return Command::SUCCESS;
    }
}