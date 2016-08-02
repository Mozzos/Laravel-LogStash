<?php
namespace Mozzos\LMRE;

use QueueManagers as Client;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Redis;

trait LMRETraits
{
    /**
     * @var Client;
     */
    public $client;

    /**
     * getClient
     * @param $id
     * @param $type
     * @param String $tag
     * @return \Mozzos\LMRE\Client
     */
    private function getClient($type,$tag = array(['*'])){
        return new \Mozzos\LMRE\Client($type,$tag);
    }

    /**
     * @param $type
     * @param array $tag
     * @param $text
     */
    function logOne($type,$tag = array(['*']),$text){
        $client = $this->getClient($type,$tag);
        if (!$client){
            new \Exception("error");
        }
        $client->logger->info($text);
    }

    /**
     * Initialization Client
     * @param $id
     * @param $type
     * @param String $tag
     */
    function initialization($type,String $tag = 'action'){
        $this->client =  new \Mozzos\LMRE\Client($type,$tag);
        return $this;
    }

    /**
     * @param $text
     */
    function log($text){
        if (!$this->client){
            new \Exception("Please initialization client on first !");
        }
        $this->client->logger->info($text);
    }
}