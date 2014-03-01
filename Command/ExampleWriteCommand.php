<?php

namespace Sweikenb\Bundle\RedisMQBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleWriteCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('sweikenb:redismq:example:write');
    }

    /**
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $mq = $this->getContainer()->get('sweikenb.redis_mq.example');
        $i = 0;
        while(true)
        {
            $i++;
            $mq->writeMessage('example:queue', array('Message: ' => ($i + 1)));
            $output->writeln("--> Message added: $i");
            usleep(500);
        }
    }
} 