<?php

namespace ConoHa\Test\Compute\Resource;

use ConoHa\ConoHa;
use ConoHa\Compute\Service;
use ConoHa\Compute\Resource\Link;

class LinkTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new Link();
        $item->setHref('test-href');
        $item->setRel('test-rel');

        $this->assertEquals('test-href', $item->getHref());
        $this->assertEquals('test-rel', $item->getRel());
    }

    public function testPopulate()
    {
        $data = [
            'href' => 'https://compute.tyo1.conoha.io/v2/',
            'rel' => 'self',
        ];

        $item = new Link();
        $item->populate(json_decode(json_encode($data)));

        $this->assertEquals('https://compute.tyo1.conoha.io/v2/', $item->getHref());
        $this->assertEquals('self', $item->getRel());
    }
}
