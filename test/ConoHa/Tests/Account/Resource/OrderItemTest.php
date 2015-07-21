<?php

namespace ConoHa\Test\Account\Resource;

use ConoHa\ConoHa;
use ConoHa\Account\Service;
use ConoHa\Account\Resource\OrderItem;

class OrderItemTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new OrderItem();
        $item->setUuId("test-uu-id");
        $item->setServiceName("test-service-name");
        $item->setServiceStartDate("test-service-start-date");
        $item->setItemStatus("test-item-status");

        $this->assertEquals("test-uu-id", $item->getUuId());
        $this->assertEquals("test-service-name", $item->getServiceName());
        $this->assertEquals("test-service-start-date", $item->getServiceStartDate());
        $this->assertEquals("test-item-status", $item->getItemStatus());
    }

    public function testPopulate()
    {
        $data = [
            'uu_id'              => 'test-uu-id',
            'service_name'       => 'test-service-name',
            'service_start_date' => 'test-service-start-date',
            'item_status'        => 'test-item-status',
        ];

        $item = new OrderItem();
        $item->populate(json_decode(json_encode($data)));

        $this->assertEquals("test-uu-id", $item->getUuId());
        $this->assertEquals("test-service-name", $item->getServiceName());
        $this->assertEquals("test-service-start-date", $item->getServiceStartDate());
        $this->assertEquals("test-item-status", $item->getItemStatus());
    }
}
