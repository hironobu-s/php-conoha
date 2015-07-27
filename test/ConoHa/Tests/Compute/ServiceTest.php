<?php

namespace ConoHa\Test\Compute;

use ConoHa\ConoHa;
use ConoHa\Compute\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    private static $service;
    public static function setUpBeforeClass()
    {
        if(API_TEST) {
            $access = __get_test_access();

            $c = new ConoHa();
            $c->setAccess($access);

            self::$service = $c->getComputeService();
        }
    }

    public function setup()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }
    }

    public function testFlavors()
    {
        $col = self::$service->flavors();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Compute\Resource\Flavor', $col[0]);
            $this->assertInternaltype('string', $col[0]->getId());
            $this->assertNull($col[0]->getOsFlvDisabled());
        } else {
            $this->markTestImcomplete('The number of order-items is 0.');
        }
        return $col;
    }

    public function testFlavorsDetail()
    {
        $col = self::$service->flavorsDetail();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Compute\Resource\Flavor', $col[0]);
            $this->assertInternalType('string', $col[0]->getId());
            $this->assertInternalType('bool', $col[0]->getOsFlvDisabled());
        } else {
            $this->markTestImcomplete('The number of order-items is 0.');
        }
        return $col;
    }
}
