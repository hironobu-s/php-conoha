<?php

namespace ConoHa\Test\Common\Resource;

use ConoHa\Common\Resource\Version;

class VersionTest extends \PHPUnit_Framework_TestCase
{
    public function setup()
    {
        $this->version = new Version();
    }

    public function testSetterGetter()
    {
        $v = new Version;

        $v->setId('v2.0');
        $v->setStatus('stable');
        $v->setUpdated('2015-07-01 12:00:00');
        $v->setMediaTypes([]);
        $v->setLinks([TEST_IDENTITY_ENDPOINT]);

        $this->assertEquals('v2.0', $v->getId());
        $this->assertEquals('stable', $v->getStatus());
        $this->assertInstanceOf('\DateTime', $v->getUpdated());
        $this->assertTrue(is_array($v->getMediaTypes()));
        $this->assertTrue(is_array($v->getLinks()));
    }
}
