<?php

namespace ConoHa\Account\Resource;

use ConoHa\Common\BaseResource;
use ConoHa\Exception\PopulateException;

class ObjectStorageRequest extends BaseResource
{
    /**
     * unixtime
     *
     * @var int $unixtime
     */
    protected $unixtime;

    /**
     * get
     *
     * @var float $get
     */
    protected $get;

    /**
     * put
     *
     * @var float $put
     */
    protected $put;

    /**
     * delete
     *
     * @var float $delete
     */
    protected $delete;



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
     * getのセット
     *
     * @param float get
     */
    public function setGet($get)
    {
        $this->get = $get;
    }

    /**
     * getの取得
     *
     * @return float
     */
    public function getGet()
    {
        return $this->get;
    }

    /**
     * putのセット
     *
     * @param float put
     */
    public function setPut($put)
    {
        $this->put = $put;
    }

    /**
     * putの取得
     *
     * @return float
     */
    public function getPut()
    {
        return $this->put;
    }

    /**
     * deleteのセット
     *
     * @param float delete
     */
    public function setDelete($delete)
    {
        $this->delete = $delete;
    }

    /**
     * deleteの取得
     *
     * @return float
     */
    public function getDelete()
    {
        return $this->delete;
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
        if(count($json) != 4) {
            throw new PopulateException('Invalid json object.');
        }

        $this->setUnixtime($json[0]);
        $this->setGet($json[1]);
        $this->setPut($json[2]);
        $this->setDelete($json[3]);
    }
}
