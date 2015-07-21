<?php

namespace ConoHa\Test\Account;

use ConoHa\ConoHa;
use ConoHa\Account\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    private static $service;
    public static function setUpBeforeClass()
    {
        $access = __get_test_access();

        $c = new ConoHa();
        $c->setAccess($access);

        self::$service = $c->getAccountService();
    }

    public function testOrderItems()
    {
        $col = self::$service->orderItems();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Account\Resource\OrderItem', $col[0]);
        }

        return $col;
    }

    /**
     * API側に不具合があるため、実装はしたがまだテストはしない
     *
     * @depends testOrderItems
     */
    public function testOrderItem($col)
    {
        if(count($col) == 0) {
            return;
        }
        //$item = $col[0];
        //$detail = self::$service->orderItem($item->getUuId());
        // $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        // if(count($col) > 0) {
        //     $this->assertInstanceOf('ConoHa\Account\Resource\OrderItem', $col[0]);
        // }
    }
}
