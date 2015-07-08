<?php

namespace ConoHa\Test\Common\Resource;

use ConoHa\Common\Resource\Version;

class VersionTest extends \PHPUnit_Framework_TestCase
{
    public function setup()
    {
        $this->version = new Version();
    }

    public function testPopulate()
    {
        $data = '{"version": {"status": "stable", "updated": "2015-05-12T09:00:00Z", "media-types": [{"base": "application/json"},{"base": "application/xml"}],"id": "v2.0","links": [{"href": "https://identity.tyo1.conoha.io/v2.0/","rel": "self"},{"href": "https://www.conoha.jp/docs/","type": "text/html","rel": "describedby"}]}}';
        $json = json_decode($data);
        $this->version->populate($json);

        $this->assertEquals('v2.0', $this->version->getId());
        $this->assertEquals('stable', $this->version->getStatus());
        $this->assertInstanceOf('\DateTime', $this->version->getUpdated());
        $this->assertEquals(2, count($this->version->getMediaTypes()));
        $this->assertTrue(is_array($this->version->getLinks()));
    }
}
