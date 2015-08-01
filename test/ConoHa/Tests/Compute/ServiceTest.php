<?php

namespace ConoHa\Test\Compute;

use ConoHa\ConoHa;
use ConoHa\Compute\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    private static $service;
    public static function setUpBeforeClass()
    {
        if(API_TEST) {
            $access = __get_test_access();

            $c = new ConoHa();
            $c->setAccess($access);

            self::$service = $c->getComputeService();
        }
    }

    public function setup()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }
    }

    public function testFlavors()
    {
        $col = self::$service->flavors();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $this->assertInstanceOf('ConoHa\Compute\Resource\Flavor', $col[0]);
            $this->assertInternaltype('string', $col[0]->getId());
            $this->assertNull($col[0]->getOsFlvDisabled());
        } else {
            $this->markTestImcomplete('The number of order-items is 0.');
        }
        return $col;
    }

    public function testFlavorsDetail()
    {
        $col = self::$service->flavors(true);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $col);
        if(count($col) > 0) {
            $item = $col[0];
            $this->assertInstanceOf('ConoHa\Compute\Resource\Flavor', $item);
            $this->assertNotNull($item->getId());
            $this->assertNotNull($item->getName());
            $this->assertNotNull($item->getRam());
            $this->assertNotNull($item->getVcpus());
            $this->assertNotNull($item->getSwap());
            $this->assertNotNull($item->getDisk());
            $this->assertNotNull($item->getOsFlavorAccessIsPublic());
            $this->assertNotNull($item->getRxtxFactor());
            $this->assertNotNull($item->getOsFlvDataEphemeral());
            $this->assertNotNull($item->getOsFlvDisabled());
            $this->assertInstanceOf('\ConoHa\Compute\Resource\Link', $item->getLinks()[0]);
        } else {
            $this->markTestImcomplete('The number of order-items is 0.');
        }
        return $col;
    }

    public function testFlavor()
    {
        $col = self::$service->flavors();
        if(count($col) == 0) {
            $this->markTestImcomplete('The number of order-items is 0.');
        }

        $item = self::$service->flavor($col[0]->getId());
        $this->assertNotNull($item->getId());
        $this->assertNotNull($item->getName());
        $this->assertNotNull($item->getRam());
        $this->assertNotNull($item->getVcpus());
        $this->assertNotNull($item->getSwap());
        $this->assertNotNull($item->getDisk());
        $this->assertNotNull($item->getOsFlavorAccessIsPublic());
        $this->assertNotNull($item->getRxtxFactor());
        $this->assertNotNull($item->getOsFlvDataEphemeral());
        $this->assertNotNull($item->getOsFlvDisabled());
        $this->assertInstanceOf('\ConoHa\Compute\Resource\Link', $item->getLinks()[0]);
    }

    public function testServers()
    {
        //$this->markTestSkipped('Not implementation yet.');
        $col = self::$service->servers();

        $item = $col[0];

        $this->assertNotNull($item->getDiskconfig());
        $this->assertNotNull($item->getAvailabilityZone());
        $this->assertNotNull($item->getHost());
        $this->assertNotNull($item->getHypervisorHostname());
        $this->assertNotNull($item->getInstanceName());
        $this->assertNotNull($item->getPowerState());
        //$this->assertNotNull($item->getTaskState());
        $this->assertNotNull($item->getVmState());
        $this->assertNotNull($item->getLaunchedAt());
        //$this->assertNotNull($item->getTerminatedAt());
        $this->assertNotNull($item->getAccessIpv4());
        $this->assertNotNull($item->getAccessIpv6());
        $this->assertNotNull($item->getAddresses());
        $this->assertNotNull($item->getConfigDrive());
        $this->assertNotNull($item->getCreated());
        $this->assertNotNull($item->getFlavor());
        $this->assertNotNull($item->getHostId());
        $this->assertNotNull($item->getId());
        $this->assertNotNull($item->getImage());
        $this->assertNotNull($item->getKeyname());
        $this->assertNotNull($item->getLinks());
        $this->assertNotNull($item->getMetadata());
        $this->assertNotNull($item->getName());
        $this->assertNotNull($item->getVolumesAttached());
        $this->assertNotNull($item->getSecurityGroups());
        $this->assertNotNull($item->getStatus());
        $this->assertNotNull($item->getTenantId());
        $this->assertNotNull($item->getUpdated());
        $this->assertNotNull($item->getUserId());
    }

    public function testServer()
    {
        $col = self::$service->servers();
        if(count($col) == 0) {
            $this->markTestImcomplete('The number of order-items is 0.');
        }

        $item = self::$service->server($col[0]->getId());

        $this->assertNotNull($item->getDiskconfig());
        $this->assertNotNull($item->getAvailabilityZone());
        $this->assertNotNull($item->getHost());
        $this->assertNotNull($item->getHypervisorHostname());
        $this->assertNotNull($item->getInstanceName());
        $this->assertNotNull($item->getPowerState());
        //$this->assertNotNull($item->getTaskState());
        $this->assertNotNull($item->getVmState());
        $this->assertNotNull($item->getLaunchedAt());
        //$this->assertNotNull($item->getTerminatedAt());
        $this->assertNotNull($item->getAccessIpv4());
        $this->assertNotNull($item->getAccessIpv6());
        $this->assertNotNull($item->getAddresses());
        $this->assertNotNull($item->getConfigDrive());
        $this->assertNotNull($item->getCreated());
        $this->assertNotNull($item->getFlavor());
        $this->assertNotNull($item->getHostId());
        $this->assertNotNull($item->getId());
        $this->assertNotNull($item->getImage());
        $this->assertNotNull($item->getKeyname());
        $this->assertNotNull($item->getLinks());
        $this->assertNotNull($item->getMetadata());
        $this->assertNotNull($item->getName());
        $this->assertNotNull($item->getVolumesAttached());
        $this->assertNotNull($item->getSecurityGroups());
        $this->assertNotNull($item->getStatus());
        $this->assertNotNull($item->getTenantId());
        $this->assertNotNull($item->getUpdated());
        $this->assertNotNull($item->getUserId());
    }
}
