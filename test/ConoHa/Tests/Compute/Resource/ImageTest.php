<?php

namespace ConoHa\Test\Compute\Resource;

use ConoHa\ConoHa;
use ConoHa\Compute\Service;
use ConoHa\Compute\Resource\Image;

class ImageTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new Image();
        $item->setId("test-id");
        $item->setLinks(array("test-links"));
        $item->setSize(47);
        $item->setCreated('2015-07-01T00:00:00');
        $item->setMetadata(array("test-metadata"));
        $item->setMinDisk(76);
        $item->setMinRam(26);
        $item->setName("test-name");
        $item->setProgress(83);
        $item->setStatus("test-status");
        $item->setUpdated('2015-07-01T00:00:00');

        $this->assertSame("test-id", $item->getId());
        $this->assertSame(array("test-links"), $item->getLinks());
        $this->assertSame(47, $item->getSize());
        $this->assertInstanceOf('\DateTime', $item->getCreated());
        $this->assertSame(array("test-metadata"), $item->getMetadata());
        $this->assertSame(76, $item->getMinDisk());
        $this->assertSame(26, $item->getMinRam());
        $this->assertSame("test-name", $item->getName());
        $this->assertSame(83, $item->getProgress());
        $this->assertSame("test-status", $item->getStatus());
        $this->assertInstanceOf('\DateTime', $item->getUpdated());
    }

    public function testPopulate()
    {
        $json = '{
                "id": "e2b62c96-abbc-41ae-a5f2-b0fe514b755c",
                "links": [
                    {
                        "href": "https://compute.tyo1.conoha.io/1864e71d2deb46f6b47526b69c65a45d/images/e2b62c96-abbc-41ae-a5f2-b0fe514b755c",
                        "rel": "bookmark"
                    }
                ]}';
        $item = new Image();
        $item->populate(json_decode($json));
    }
}
