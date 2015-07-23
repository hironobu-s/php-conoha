<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;
use ConoHa\Exception\PopulateException;

class ObjectStorageSize extends BaseResource
{
    /**
     * unixtime
     *
     * @var int $unixtime
     */
    protected $unixtime;

    /**
     * value
     *
     * @var float $value
     */
    protected $value;



    /**
     * unixtimeのセット
     *
     * @param int unixtime
     */
    public function setUnixtime($unixtime)
    {
        $this->unixtime = $unixtime;
    }

    /**
     * unixtimeの取得
     *
     * @return int
     */
    public function getUnixtime()
    {
        return $this->unixtime;
    }

    /**
     * valueのセット
     *
     * @param float value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * valueの取得
     *
     * @return float
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * populate()のオーバーライド
     *
     * @param array $json
     * @return void
     * @throws \ConoHa\Exception\PopulateException
     */
    public function populate(array $json)
    {
        if(count($json) != 2) {
            throw new PopulateException('Invalid json object.');
        }

        $this->setUnixtime($json[0]);
        $this->setValue($json[1]);
    }
}
