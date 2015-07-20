<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\ConoHa;
use ConoHa\Api\Client;
use ConoHa\Identity\Resource\Token;
use ConoHa\Common\ResourceCollection;
use ConoHa\Identity\Resource\Access;

class AccessTest extends \PHPUnit_Framework_TestCase
{
    protected static $conoha;
    protected static $access;
    public static function setUpBeforeClass()
    {
        $secret = __get_test_secret();
        $conoha = new ConoHa();
        self::$access = $conoha->auth($secret);
    }

    public function testGetToken()
    {
        $this->assertInstanceOf('ConoHa\Identity\Resource\Token', self::$access->getToken());
    }

    public function testGetServiceCatalog()
    {
        $catalog = self::$access->getServiceCatalog();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $catalog);
        $this->assertInstanceOf('ConoHa\Identity\Resource\ServiceCatalog', $catalog[0]);
    }

    public function testSetToken()
    {
        $token = new Token();
        $ret = self::$access->setToken($token);
        $this->assertInstanceOf('ConoHa\Identity\Resource\Token', $ret);
    }

    public function testSetServiceCatalog()
    {
        $col = new ResourceCollection();
        $ret = self::$access->setServiceCatalog($col);
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $ret);
    }

    public function testPopulate()
    {
        $conoha = new ConoHa();
        $ident = $conoha->getIdentityService(TEST_IDENTITY_ENDPOINT);
        $secret = __get_test_secret();
        $ident->tokens($secret);
    }
}
