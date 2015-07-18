<?php

namespace ConoHa\Tests\Identity\Resource;

use ConoHa\Identity\Resource\Secret;

class SecretTest extends \PHPUnit_Framework_TestCase
{
    public function testSetter() {
        $s = new Secret();
        $s->setUsername(TEST_API_USERNAME);
        $s->setPassword(TEST_API_PASSWORD);
        $s->setTenantName(TEST_API_TENANT_NAME);
        $s->setTenantId(TEST_API_TENANT_ID);
        $s->setAuthUrl(TEST_IDENTITY_ENDPOINT);
    }

    public function testNoSchemeUrl() {
        $info = parse_url(TEST_IDENTITY_ENDPOINT);
        $s = new Secret();
        $s->setAuthUrl("//" . $info['host']);

        $url = $s->getAuthUrl();
        $this->assertEquals(TEST_IDENTITY_ENDPOINT, $url);
    }

    /**
     * @expectedException ConoHa\Exception\IncorrectUrlException
     */
    public function testInvalidUrl() {
        $s = new Secret();
        $s->setAuthUrl("invalid url");
    }

    public function testGetter() {
        $s = new Secret();
        $s->getUsername();
        $s->getPassword();
        $s->getTenantName();
        $s->getTenantId();
        $s->getAuthUrl();
    }
}
