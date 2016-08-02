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
    private function getClient($id,$type,String $tag = 'action'){
        return new \Mozzos\LMRE\Client($id,$type,$tag);
    }

    /**
     * Log a log
     * @param $id
     * @param $type
     * @param String $tag
     */
    function logOne($id,$type,String $tag = 'action',$text){
        $client = $this->getClient($id,$type,$tag);
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
    function initialization($id,$type,String $tag = 'action'){
        $this->client =  new \Mozzos\LMRE\Client($id,$type,$tag);
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