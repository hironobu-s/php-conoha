<?php

namespace ConoHa\Test\Common\Resource;

use ConoHa\Common\Resource\Version;
use ConoHa\Common\Resource\Versions;

class VersionsTest extends \PHPUnit_Framework_TestCase
{
    public function setup()
    {
        $this->versions = new Versions();
    }

    public function testPopulate()
    {
        $data = '{"versions": {"values": [{"status": "stable", "updated": "2015-05-12T09:00:00Z", "media-types": [{"base": "application/json"},{"base": "application/xml"}],"id": "v2.0","links": [{"href": "https://identity.tyo1.conoha.io/v2.0/","rel": "self"},{"href": "https://www.conoha.jp/docs/","type": "text/html","rel": "describedby"}]}]}}';
        $json = json_decode($data);
        $this->versions->populate($json);

        $this->assertCount(1, $this->versions);
        $this->assertInstanceOf('\ConoHa\Common\Resource\Version', $this->versions[0]);
    }
}
