<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\Identity\Resource\ServiceCatalog;

class ServiceCatalogTest extends \PHPUnit_Framework_TestCase
{
    public function testSetter() {
        $s = new ServiceCatalog();
        $s->setEndpoints([]);
        $s->setEndpointLinks([]);
        $s->setName('');
        $s->setType('');
    }

    public function testGetter() {
        $s = new ServiceCatalog();
        $s->getEndpoints();
        $s->getEndpointLinks();
        $s->getName();
        $s->getType();
    }
}
