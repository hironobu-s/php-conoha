<?php

namespace ConoHa\Test\Account\Resource;

use ConoHa\ConoHa;
use ConoHa\Account\Service;
use ConoHa\Account\Resource\ProductItem;

class ProductItemTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new ProductItem();
        $item->setProductName("test-product_name");
        $item->setServiceName("test-service-name");
        $item->setUnitPrice(500);
        $item->setRegionName("test-region-name");

        $this->assertEquals("test-product_name", $item->getProductname());
        $this->assertEquals("test-service-name", $item->getServiceName());
        $this->assertEquals(500, $item->getUnitPrice());
        $this->assertEquals("test-region-name", $item->getRegionName());
    }
}
