<?php
/**
 * Created by PhpStorm.
 * User: Brett
 * Date: 2016/8/2
 * Time: 14:45
 */

namespace Mozzos\LMRE;


use Monolog\Formatter\LogstashFormatter;
use Monolog\Logger;

class Client
{

    public $logger;

    /**
     * Client constructor.
     */
    public function __construct($id,$type,String $tag)
    {
        // Init a RedisHandler with a LogstashFormatter.
        // The parameters may differ depending on your configuration of Redis.
        // Important: The parameter 'logs' must be equal to the key you defined
        // in your logstash configuration.
        $redisHandler = new RedisHandler(new \Predis\Client(), config('index').'-'.$id);
        $formatter = new LogstashFormatter($type);
        $redisHandler->setFormatter($formatter);

        // Create a Logger instance with the RedisHandler
        $this->logger = new Logger($tag, array($redisHandler));
    }
}