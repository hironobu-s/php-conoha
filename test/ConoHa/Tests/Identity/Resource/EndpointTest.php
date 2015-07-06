<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\Identity\Resource\Endpoint;

class EndpointTest extends \PHPUnit_Framework_TestCase
{
    public function testSetter() {
        $s = new Endpoint();
        $s->setRegion("value");
        $s->setPublicUrl("value");
    }

    public function testGetter() {
        $s = new Endpoint();
        $s->getRegion();
        $s->getPublicUrl();
    }
}
