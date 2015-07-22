<?php

namespace ConoHa\Identity\Resource;

use ConoHa\Common\BaseResource;
use ConoHa\Api\Response;
use ConoHa\Exception\PopulateException;

class Token extends BaseResource
{
    /**
     * id
     *
     * @var string $id
     */
    private $id;

    /**
     * expires
     *
     * @var \DateTime $expires
     */
    private $expires;

    /**
     * issued_at
     *
     * @var string $issued_at
     */
    private $issued_at;



    /**
     * idのセット
     *
     * @param string id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * idの取得
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * expiresのセット
     *
     * @param string expires
     */
    public function setExpires($expire)
    {
        if(is_string($expire)) {
            $expire = new \DateTime($expire, new \DateTimezone('UTC'));
        }
        $this->expires = $expire;
    }

    /**
     * expiresの取得
     *
     * @return \DateTime
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * issued_atのセット
     *
     * @param string issued_at
     */
    public function setIssuedAt($issued_at)
    {
        $this->issued_at = $issued_at;
    }

    /**
     * issued_atの取得
     *
     * @return string
     */
    public function getIssuedAt()
    {
        return $this->issued_at;
    }
}
