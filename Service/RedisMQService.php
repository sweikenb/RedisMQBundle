<?php

namespace Sweikenb\Bundle\RedisMQBundle\Service;

use Predis\Client;

class RedisMQService
{
    /**
     * @var \Predis\Client
     */
    private $redisClient;

    /**
     * @param Client $redisClient
     */
    public function __construct(Client $redisClient)
    {
        $this->redisClient = $redisClient;
    }

    /**
     * Adds a new message to the specified queue
     *
     * @param string $queueName  Name of the queue
     * @param mixed  $msg        Message to send
     * @param bool   $jsonEncode Autoencode to JSON before sending?
     *
     * @return $this
     */
    public function writeMessage($queueName, $msg, $jsonEncode = true)
    {
        // autoencpde message
        if ($jsonEncode) {
            $msg = json_encode($msg, JSON_FORCE_OBJECT);
        }

        // add to list
        $this->redisClient->RPUSH($queueName, $msg);

        // return the curren instance for chaining
        return $this;
    }

    /**
     * Returns the next message of the specified queue
     *
     * @param string $queueName  Name of the queue
     * @param bool   $blocking   Wait for the next message?
     * @param bool   $jsonDecode Autodecode the message from JSON to array?
     *
     * @return mixed
     */
    public function readMessage($queueName, $blocking = true, $jsonDecode = true)
    {
        // get the next element of the list
        if($blocking) {
            $msg = $this->redisClient->BLPOP($queueName, 0);
            if(is_array($msg)) {
                $msg = $msg[1];
            }
        }
        else {
            $msg = $this->redisClient->LPOP($queueName);
        }

        // autodecode the message?
        if(null !== $msg && $jsonDecode) {
            $msg = json_decode($msg, true);
        }

        // return the message
        return $msg;
    }
}