<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\Identity\Resource\Token;

class TokenTest extends \PHPUnit_Framework_TestCase
{
    public function testSetter() {
        $s = new Token();
        $s->setId('test-id');
        $s->setExpires('2015-01-01');
        $s->setIssuedAt('test-issued-at');

        $this->assertEquals('test-id', $s->getId());
        $this->assertInstanceOf('\DateTime', $s->getExpires());
        $this->assertEquals('test-issued-at', $s->getIssuedAt());
    }

    public function testExpires() {
        $date = "2015-07-01 12:00:00";

        $s = new Token();
        $s->setExpires($date);
        $expires = $s->getExpires();

        $d = new \DateTime($date);
        $this->assertEquals($d->diff($expires)->format('%s'), 0);
    }
}
