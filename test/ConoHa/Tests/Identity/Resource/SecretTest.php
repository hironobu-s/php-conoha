<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\Identity\Resource\Secret;

class SecretTest extends \PHPUnit_Framework_TestCase
{
    public function testSetter() {
        $s = new Secret();
        $s->setUsername("value");
        $s->setPassword("value");
        $s->setTenantName("value");
        $s->setTenantId("value");
    }

    public function testGetter() {
        $s = new Secret();
        $s->getUsername();
        $s->getPassword();
        $s->getTenantName();
        $s->getTenantId();
    }

    /**
     * @expectedException BadMethodCallException
     */
    public function testUndefinededWrite() {
        $s = new Secret();
        $s->setApiUsername2("value");
    }

    /**
     * @expectedException BadMethodCallException
     */
    public function testUndefinededRead() {
        $s = new Secret();
        $v = $s->getUsername2();
    }
}
