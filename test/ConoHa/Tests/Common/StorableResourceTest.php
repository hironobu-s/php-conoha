<?php

namespace ConoHa\Tests\Common;

use ConoHa\Common\BaseService;
use ConoHa\Common\StorableResource;

class TestService2 extends BaseService
{
}

class TestResource2 extends StorableResource
{
    private $prop1;
    public function setProp1($prop1)
    {
        $this->prop1 = $prop1;
    }

    public function getProp1()
    {
        return $this->prop1;
    }

    public function setUuId($uu_id)
    {
        $this->uu_id = $uu_id;
    }

    /**
     * uu_idの取得
     *
     * @return string
     */
    public function getUuId()
    {
        return $this->uu_id;
    }
}

class StorableResourceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \BadMethodCallException
     */
    public function testStore()
    {
        $item = new TestResource2(new TestService2(TEST_IDENTITY_ENDPOINT));
        $item->store();
    }
}
