<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\Identity\Resource\Endpoint;

class EndpointTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $s = new Endpoint();
        $s->setRegion("test-region");
        $s->setPublicUrl("test-public-url");

        $this->assertEquals("test-region", $s->getRegion());
        $this->assertEquals("test-public-url", $s->getPublicUrl());
    }
}
