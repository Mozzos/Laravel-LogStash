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
    function logOne($type,$text,$tag = array(['*']),$exception = array(['*'])){
        $client = $this->getClient($type,$tag);
        if (!$client){
            new \Exception("error");
        }
        $text = $this->serialize($text);
        $client->logger->info($text,$exception);
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
    function log($text,$exception = array(['*'])){
        if (!$this->client){
            new \Exception("Please initialization client on first !");
        }
        $this->client->logger->info($text,$exception);
    }

    private function serialize($content){
        if (!empty($content)&&is_array($content)&&count($content)==3){
            return $content[0] . '=>' . $content[1] . '=>' .$content[2];
        }else{
            return '';
        }
    }


}