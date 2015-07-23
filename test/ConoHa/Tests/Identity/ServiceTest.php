<?php

namespace ConoHa\Test\Identity;

use ConoHa\Identity\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function setup()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }
    }

    public function testTokens()
    {
        $secret = __get_test_secret();

        $service = new Service(TEST_IDENTITY_ENDPOINT);
        $access = $service->tokens($secret);
        $this->assertInstanceOf('ConoHa\Identity\Resource\Access', $access);

        $token = $access->getToken();
        $this->assertInstanceOf('ConoHa\Identity\Resource\Token', $token);
        $this->assertNotNull($token->getId());

        $catalog = $access->getServiceCatalog();
        $this->assertInstanceOf('ConoHa\Common\ResourceCollection', $catalog);
        $this->assertGreaterThan(1, count($catalog));

        $this->assertNotNull($access->getCatalogByType('identity'));
        $this->assertNotNull($access->getCatalogByType('compute'));
        $this->assertNotNull($access->getCatalogByType('image'));
        $this->assertNotNull($access->getCatalogByType('volumev2'));
        $this->assertNotNull($access->getCatalogByType('network'));
        $this->assertNotNull($access->getCatalogByType('object-store'));
        $this->assertNotNull($access->getCatalogByType('dns'));
        $this->assertNotNull($access->getCatalogByType('mailhosting'));
        $this->assertNotNull($access->getCatalogByType('databasehosting'));
        $this->assertNotNull($access->getCatalogByType('account'));
    }

    public function testTokenFail()
    {
        $secret = __get_test_secret();
        $secret->setPassword('hoge');
        $service = new Service(TEST_IDENTITY_ENDPOINT);

        try {
            $access = $service->tokens($secret);

        } catch(\ConoHa\Exception\HttpErrorException $ex) {
            $res = $ex->getLastResponse();
            $this->assertEquals(401, $res->getHttpCode());

            return ;
        }

        $this->fail('Expect to throw HttpErrorException');
    }
}
