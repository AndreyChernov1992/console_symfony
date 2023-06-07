<?php
namespace Console\App\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class ReverseCommand extends Command {
    protected function configure() {
        $this->setName("reverse")
            ->setDescription("Your string reverse!")
            ->setHelp("First custom command test");
            
    }
    protected function execute(InputInterface  $input, OutputInterface $output) {
        $string = $input->getArgument("string");
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