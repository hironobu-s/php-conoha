<?php

namespace ConoHa\Test\Compute\Resource;

use ConoHa\ConoHa;
use ConoHa\Compute\Service;
use ConoHa\Compute\Resource\SecurityGroup;

class SecurityGroupTest extends \PHPUnit_Framework_TestCase
{
    public function testSetterGetter()
    {
        $item = new SecurityGroup();
        $item->setDescription("test-description");
        $item->setId("test-id");
        $item->setName("test-name");
        $item->setRules(array("test-rules"));
        $item->setTenantId("test-tenantid");

        $this->assertSame("test-description", $item->getDescription());
        $this->assertSame("test-id", $item->getId());
        $this->assertSame("test-name", $item->getName());
        $this->assertSame(array("test-rules"), $item->getRules());
        $this->assertSame("test-tenantid", $item->getTenantId());
    }
}
