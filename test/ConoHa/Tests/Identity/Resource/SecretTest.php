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


        $this->assertEquals(TEST_API_USERNAME, $s->getUsername());
        $this->assertEquals(TEST_API_PASSWORD, $s->getPassword());
        $this->assertEquals(TEST_API_TENANT_NAME, $s->getTenantName());
        $this->assertEquals(TEST_API_TENANT_ID, $s->getTenantId());
        $this->assertEquals(TEST_IDENTITY_ENDPOINT, $s->getAuthUrl());
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
}
