<?php

namespace Sweikenb\Bundle\RedisMQBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ExampleReadCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this->setName('sweikenb:redismq:example:read');
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
        while (true) {
            $msg = $mq->readMessage('example:queue');
            print_r($msg);
            usleep(500);
        }
    }
} 