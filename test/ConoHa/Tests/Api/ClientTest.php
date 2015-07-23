<?php

namespace ConoHa\Tests\Api;

use ConoHa\Api\Client;
use ConoHa\Api\Response;
use ConoHa\Exception\HttpErrorException;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $client;
    private $curl;
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
            $this->markTestSkipped('This test requires API access to execute.');
        }

        $url = TEST_IDENTITY_ENDPOINT;
        $res = $this->client->get($url);

        $curl = __get_curl_resource($res);
        $info = curl_getinfo($curl);
        $this->assertEquals(TEST_IDENTITY_ENDPOINT . '/', $info['url']);
        $this->assertStringStartsWith("GET", $info['request_header']);
    }

    public function testSendRequestWidhContent()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }

        try {
            $url = TEST_IDENTITY_ENDPOINT;
            $options = [
                'body' => 'Test Contents',
            ];

            $res = $this->client->post($url, $options);

        } catch(HttpErrorException $ex) {
            // Exception throwed becase request might failed with 405 Method not allowed.
            $res = $ex->getLastResponse();
        }

        $curl = __get_curl_resource($res);
        $info = curl_getinfo($curl);
        $header = $info['request_header'];
        $this->assertEquals(TEST_IDENTITY_ENDPOINT . '/', $info['url']);
        $this->assertStringStartsWith("POST", $header);
        $this->assertContains("Content-Length: 13", $header);
        $this->assertContains("Content-Type: application/x-www-form-urlencoded", $header);
    }

    public function testSendRequestWithCustomHeaders()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }

        $url = TEST_IDENTITY_ENDPOINT;
        $options = [
            'headers' => [
                'X-CustomHeaderTest1' => 'hoge',
                'X-CustomHeaderTest2' => 'fuga',
            ]
        ];

        $res = $this->client->get($url, $options);

        $curl = __get_curl_resource($res);
        $info = curl_getinfo($curl);
        $header = $info['request_header'];
        $this->assertContains("X-CustomHeaderTest1: hoge", $header);
        $this->assertContains("X-CustomHeaderTest2: fuga", $header);
    }

    public function testSendRequestWithDebug()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
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
