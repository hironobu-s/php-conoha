<?php

namespace ConoHa\Test\Compute\Resource;

use ConoHa\ConoHa;
use ConoHa\Compute\Service;
use ConoHa\Compute\Resource\Flavor;

class FlavorTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new Flavor();
        $item->setId('test-id');
        $item->setName('test-name');
        $item->setLinks([
            'url1',
            'url2',
        ]);

        $this->assertEquals('test-id', $item->getId());
        $this->assertEquals('test-name', $item->getName());
        $this->assertCount(2, $item->getLinks());
    }

    public function testPopulate()
    {
        $data                            = [
            'id'                         => 'test-id',
            'name'                       => 'test-name',
            "ram"                        => 65536,
            "OS-FLV-DISABLED:disabled"   => false,
            "vcpus"                      => 24,
            "swap"                       => "",
            "os-flavor-access:is_public" => true,
            "rxtx_factor"                => 1,
            "OS-FLV-EXT-DATA:ephemeral"  => 0,
            "disk"                       => 50,
            'links'                      => [
                [
                    'href'               => 'https://compute.tyo1.conoha.io/v2/',
                    'rel'                => 'self',
                ]
            ]
        ];

        $item = new Flavor();
        $item->populate(json_decode(json_encode($data)));

        $this->assertEquals('test-id', $item->getId());
        $this->assertEquals('test-name', $item->getName());
        $this->assertCount(1, $item->getLinks());
        $this->assertEquals(65536, $item->getRam());
        $this->assertEquals(24, $item->getVcpus());
        $this->assertEquals("", $item->getSwap());
        $this->assertEquals(50, $item->getDisk());
        $this->assertEquals(true, $item->getOsFlavorAccessIsPublic());
        $this->assertEquals(1, $item->getRxtxFactor());
        $this->assertEquals(null, $item->getOsFlvDataEphemeral());
        $this->assertEquals(0, $item->getOsFlvDisabled());
        $this->assertInstanceOf('\ConoHa\Compute\Resource\FlavorLink', $item->getLinks()[0]);
    }
}
