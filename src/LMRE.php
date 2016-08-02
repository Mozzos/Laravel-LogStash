<?php
/**
 * Created by PhpStorm.
 * User: Brett
 * Date: 2016/6/13
 * Time: 23:17
 */

namespace Mozzos\LMRE;

class LMRE
{
    public $id;

    public $timestamp;

    public $message;

    public $type;

    public $version;

    public $source;

    /**
     * IMRE constructor.
     * @param $id
     * @param $timestamp
     * @param $message
     * @param $type
     * @param $version
     * @param $source
     */
    public function __construct($id, $timestamp, $message, $type, $version, $source)
    {
        $this->id = $id;
        $this->timestamp = $timestamp;
        $this->message = $message;
        $this->type = $type;
        $this->version = $version;
        $this->source = $source;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param mixed $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param mixed $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }




}