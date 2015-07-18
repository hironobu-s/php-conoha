<?php

namespace ConoHa\Test\Identity;

use ConoHa\Identity\Service;

class ServiceTest extends \PHPUnit_Framework_TestCase
{
    public function testTokens()
    {
        $secret = __get_test_secret();

        $service = new Service(TEST_IDENTITY_ENDPOINT);
        $access = $service->tokens($secret);
        $this->assertInstanceOf('ConoHa\Identity\Resource\Access', $access);
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
