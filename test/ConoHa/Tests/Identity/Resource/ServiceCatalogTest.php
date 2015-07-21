<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\Identity\Resource\ServiceCatalog;

class ServiceCatalogTest extends \PHPUnit_Framework_TestCase
{
    public function testSetter() {
        $s = new ServiceCatalog();
        $s->setEndpoints(['endpoint']);
        $s->setEndpointLinks(['endpoint-links']);
        $s->setName('test-name');
        $s->setType('test-type');

        $this->assertEquals(['endpoint'], $s->getEndpoints());
        $this->assertEquals(['endpoint-links'], $s->getEndpointLinks());
        $this->assertEquals('test-name', $s->getName());
        $this->assertEquals('test-type', $s->getType());
    }
}
