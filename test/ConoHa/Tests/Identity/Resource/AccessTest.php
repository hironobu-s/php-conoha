<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\ConoHa;
use ConoHa\Identity\Resource\Access;

class AccessTest extends \PHPUnit_Framework_TestCase
{
    protected static $access;
    public static function setUpBeforeClass()
    {
        $secret = __get_test_secret();
        $conoha = new ConoHa();
        self::$access = $conoha->auth($secret);
    }

    public function testGetToken()
    {
        $this->assertInstanceOf('\ConoHa\Identity\Resource\Token', self::$access->getToken());
    }

    public function testGetServiceCatalog()
    {
        $this->assertInstanceOf('\ConoHa\Identity\Resource\ServiceCatalog', self::$access->getServiceCatalog());
    }
}
