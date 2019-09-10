<?php

namespace Hl7v2\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

//use Hl7v2\MessageParser;
//use Hl7v2\Message;

class ParseCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('hl7v2:parse')
            ->setDescription('Parse an hl7v2 message file')
            ->addArgument(
                'filename',
                InputArgument::REQUIRED,
                'Filename'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $filename = $input->getArgument('filename');
        /*
        $parser = new MessageParser();
        $data = file_get_contents($filename);
        $message = $parser->parse($data);

        $s = $message->getSegmentsByName('MSH');
        print_r($message);
        if (count($s)==1) {
            //print_r($s[0]);
            print_r($s[0]->getField(8));
        }
        */
    }
}
