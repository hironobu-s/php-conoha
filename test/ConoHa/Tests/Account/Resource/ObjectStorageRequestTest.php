<?php

namespace ConoHa\Test\Account\Resource;

use ConoHa\ConoHa;
use ConoHa\Account\Service;
use ConoHa\Account\Resource\ObjectStorageRequest;

class ObjectStorageRequestTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new ObjectStorageRequest();
        $item->setUnixtime(1437624000);
        $item->setGet(100);
        $item->setPut(200);
        $item->setDelete(300);

        $this->assertEquals(1437624000, $item->getUnixtime());
        $this->assertEquals(100, $item->getGet());
        $this->assertEquals(200, $item->getPut());
        $this->assertEquals(300, $item->getDelete());
    }

    public function testPopulate()
    {
        $data = [
            1437624000,
            100,
            200,
            300,
        ];

        $item = new ObjectStorageRequest();
        $item->populate($data);

        $this->assertEquals(1437624000, $item->getUnixtime());
        $this->assertEquals(100, $item->getGet());
        $this->assertEquals(200, $item->getPut());
        $this->assertEquals(300, $item->getDelete());
    }
}
