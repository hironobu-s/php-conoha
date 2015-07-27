<?php

namespace ConoHa\Test\Compute\Resource;

use ConoHa\ConoHa;
use ConoHa\Compute\Service;
use ConoHa\Compute\Resource\Address;

class AddressTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new Address();
        $item->setMacAddr('test-macaddr');
        $item->setType('test-type');
        $item->setAddr('192.168.0.0');
        $item->setVersion(4);

        $this->assertEquals('test-macaddr', $item->getMacAddr());
        $this->assertEquals('test-type', $item->getType());
        $this->assertEquals('192.168.0.0', $item->getAddr());
        $this->assertEquals(4, $item->getVersion());
    }
}
