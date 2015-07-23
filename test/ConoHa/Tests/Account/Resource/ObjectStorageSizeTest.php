<?php

namespace ConoHa\Test\Account\Resource;

use ConoHa\ConoHa;
use ConoHa\Account\Service;
use ConoHa\Account\Resource\ObjectStorageSize;

class ObjectStorageSizeTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new ObjectStorageSize();
        $item->setUnixtime(1437624000);
        $item->setValue(100);

        $this->assertEquals(1437624000, $item->getUnixtime());
        $this->assertEquals(100, $item->getValue());
    }

    public function testPopulate()
    {
        $data = [
            1437624000,
            100,
        ];

        $item = new ObjectStorageSize();
        $item->populate($data);

        $this->assertEquals(1437624000, $item->getUnixtime());
        $this->assertEquals(100, $item->getValue());
    }
}
