<?php

namespace ConoHa\Tests\Api;

use ConoHa\Api\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    protected $client;
    public function setup()
    {
        $this->client = new Client();
    }

    public function testGetDefaultUserAgent()
    {
        $ua = $this->client->getDefaultUserAgent();
        $this->assertNotEquals("", $ua);
    }

    /**
     * @expectedException ConoHa\Exception\HttpErrorException
     */
    public function testInvalidMethod()
    {
        $url = TEST_IDENTITY_ENDPOINT;
        $res = $this->client->hoge($url);
    }

    public function testSendRequest()
    {
        if(!API_TEST) {
            return ;
        }

        $url = TEST_IDENTITY_ENDPOINT;
        $res = $this->client->get($url);

        $this->assertEquals(TEST_IDENTITY_ENDPOINT, $res->getUrl());

        $requests = $res->getRequestHeader();
        $this->assertStringStartsWith("GET", $requests);
    }

    public function testSendRequestWidhContent()
    {
        if(!API_TEST) {
            return ;
        }

        try {
            $url = TEST_IDENTITY_ENDPOINT;
            $options = [
                'body' => 'Test Contents',
            ];

            $res = $this->client->post($url, $options);

        } catch(\Exception $ex) {
            // Exception throwed becase request might failed with 405 Method not allowed.
            $res = $ex->getLastResponse();
        }

        $this->assertEquals(TEST_IDENTITY_ENDPOINT, $res->getUrl());

        $requests = $res->getRequestHeader();
        $this->assertStringStartsWith("POST", $requests);
        $this->assertContains("Content-Length: 13", $requests);
        $this->assertContains("Content-Type: application/x-www-form-urlencoded", $requests);
    }

    public function testSendRequestWithCustomHeaders()
    {
        if(!API_TEST) {
            return ;
        }

        $url = TEST_IDENTITY_ENDPOINT;
        $options = [
            'headers' => [
                'X-CustomHeaderTest1' => 'hoge',
                'X-CustomHeaderTest2' => 'fuga',
            ]
        ];
        $res = $this->client->get($url, $options);

        $requests = $res->getRequestHeader();
        $this->assertContains("X-CustomHeaderTest1: hoge", $requests);
        $this->assertContains("X-CustomHeaderTest2: fuga", $requests);
    }

    public function testSendRequestWithDebug()
    {
        if(!API_TEST) {
            return ;
        }

        $url = TEST_IDENTITY_ENDPOINT;
        $fp = tmpfile();
        $options = [ 'debug' => $fp ];
        $res = $this->client->get($url, $options);

        fseek($fp, 0, SEEK_SET);
        $debug = fread($fp, 8192);

        $this->assertNotEquals("", $debug);
    }
}
