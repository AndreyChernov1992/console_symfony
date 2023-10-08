<?php

namespace Console\App\Commands;

use Console\App\Reverse;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReverseCommand extends Command 
{

    protected function configure() 
    {
        $this->setName("reverse")
            ->setDescription("Your string reverse!")
            ->setHelp("First custom command test")
            ->addArgument("file", InputArgument::REQUIRED, "Put file or write your string");
    }

    protected function execute(InputInterface  $input, OutputInterface $output) 
    {
        $reverse = new Reverse;
        $file = $input->getArgument("file");
        $string = file_exists(ROOT . "$file") ? file_get_contents(ROOT . $file) : $file;
        $output->writeln("Reversing $string");       
        $output->writeln($reverse->reverse($string));
        
        return 0;
    }
}