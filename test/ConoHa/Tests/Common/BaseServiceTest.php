<?php

namespace ConoHa\Tests\Common;

use ConoHa\Common\BaseService;
use ConoHa\Identity\Resource\Token;

class TestService extends BaseService
{
    protected $properties = [
        'prop1' => null,
        'prop_test2' => null,
        'prop_test_no3' => null,
    ];
}

class BaseServiceTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->service = new TestService(TEST_IDENTITY_ENDPOINT);
    }

    public function testUri()
    {
        $this->service->setEndpoint(TEST_IDENTITY_ENDPOINT);

        $uri = $this->service->getUri('foo');
        $this->assertEquals($uri, TEST_IDENTITY_ENDPOINT . '/foo');

        $uri = $this->service->getUri(['foo', 'bar', 'baz']);
        $this->assertEquals($uri, TEST_IDENTITY_ENDPOINT . '/foo/bar/baz');
    }

    public function testSetToken()
    {
        $token = new Token();
        $this->service->setToken($token);
    }

    public function testGetVersions()
    {
        if(!API_TEST) {
            return ;
        }

        $v = $this->service->getVersions();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $v);
    }

    public function testGetVersion()
    {
        if(!API_TEST) {
            return ;
        }

        $v = $this->service->getVersion("v2.0");
        $this->assertInstanceOf('ConoHa\Common\Resource\Version', $v);
    }

    public function testGetStableVersion()
    {
        if(!API_TEST) {
            return ;
        }

        $v = $this->service->getStableVersion();
        $this->assertInstanceOf('ConoHa\Common\Resource\Version', $v);
    }
}
