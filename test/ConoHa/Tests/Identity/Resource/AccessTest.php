<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\ConoHa;
use ConoHa\Api\Client;
use ConoHa\Identity\Resource\Token;
use ConoHa\Identity\Resource\ServiceCatalog;
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
        $this->assertInstanceOf('ConoHa\Identity\Resource\ServiceCatalog', self::$access->getServiceCatalog());
    }

    public function testSetToken()
    {
        $token = new Token();
        $ret = self::$access->setToken($token);
        $this->assertInstanceOf('ConoHa\Identity\Resource\Token', $ret);
    }

    public function testSetServiceCatalog()
    {
        $sc = new ServiceCatalog();
        $ret = self::$access->setServiceCatalog($sc);
        $this->assertInstanceOf('ConoHa\Identity\Resource\ServiceCatalog', $ret);
    }

    public function testPopulate()
    {
        $conoha = new ConoHa();
        $ident = $conoha->getIdentityService(TEST_IDENTITY_ENDPOINT);
        $secret = __get_test_secret();
        $ident->tokens($secret);
    }
}
