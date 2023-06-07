<?php

namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputOption;

class ReverseCommand extends Command {

    protected function configure() {
        $this->setName("reverse")
            ->setDescription("Your string reverse!")
            ->setHelp("First custom command test")
            ->addArgument("file", InputArgument::REQUIRED, "Put file or write your string")
            ->addOption("string", null, InputOption::VALUE_REQUIRED, "Write your string")
            ->addOption("file", null, InputOption::VALUE_REQUIRED, "Write path to your file");
    }

    protected function execute(InputInterface  $input, OutputInterface $output) {

        $file = $input->getArgument("file");
        file_exists(ROOT . "$file") ? $string = file_get_contents(ROOT . $file) : $string = $file;
        $output->writeln("Reversing $string");       
        $reversedStrings = explode(" ", $string);

        foreach ($reversedStrings as &$word) {
            $chars = str_split($word, 1);
            $filteredChars = [];
            foreach (array_reverse($chars) as $char) {
                if (ctype_alpha($char)) {
                    $filteredChars[] = $char;
                }
            }
            foreach ($chars as &$char) {
                if (!ctype_alpha($char)) {
                    continue;
                }
                $char = array_shift($filteredChars);
            }
            $word = implode("", $chars);
        }
        $output->writeln(implode(" ", $reversedStrings));
        return 0;
    }
}