<?php

namespace ConoHa\Tests\Api;

use ConoHa\Api\Client;
use ConoHa\Api\Response;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    protected $curl;
    public function setup()
    {
        $this->curl = curl_init();

        curl_setopt($this->curl, CURLINFO_HEADER_OUT, true);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($this->curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($this->curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($this->curl, CURLOPT_HEADER, true);
    }

    public function testConstructor()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }

        curl_setopt($this->curl, CURLOPT_URL, TEST_IDENTITY_ENDPOINT);

        $res = curl_exec($this->curl);
        $response = new Response($this->curl, $res);

        $this->assertInstanceOf('ConoHa\Api\Response', $response);

        return $response;
    }

    /**
     * @depends testConstructor
     */
    public function testGetHttpCode($response)
    {
        $this->assertLessThan(399, $response->getHttpCode());
    }

    /**
     * @depends testConstructor
     */
    public function testGetRequestHeaders($response)
    {
        $this->assertGreaterThanOrEqual(1, count($response->getRequestHeaders()));
    }

    /**
     * @depends testConstructor
     */
    public function testGetResponseHeaders($response)
    {
        $this->assertGreaterThanOrEqual(1, count($response->getResponseHeaders()));
    }

    /**
     * @expectedException ConoHa\Exception\HttpErrorException
     */
    public function testConstructorWithNullResponse()
    {
        $r = new Response($this->curl, null);
    }

    public function testConstructorWithHtmlError()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }

        curl_setopt($this->curl, CURLOPT_URL, TEST_IDENTITY_ENDPOINT . "/foobar");

        try {
            $res = curl_exec($this->curl);
            $r = new Response($this->curl, $res);

        } catch(\Exception $ex) {
            $res = $ex->getLastResponse();

            $curl = __get_curl_resource($res);
            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            $this->assertEquals(404, $http_code);

            // OK
            return ;
        }

        $this->fail('Unexpected HTTP status code.');
    }

    /**
     * @expectedException ConoHa\Exception\HttpErrorException
     */
    public function testConstructorWithJsonError()
    {
        if(!API_TEST) {
            $this->markTestSkipped('This test requires API access to execute.');
        }

        $secret = '
{
  "auth": {
    "passwordCredentials": {
      "username": "ConoHa",
      "password": "paSSword123456#$%"
    },
    "tenantId": "487727e3921d44e3bfe7ebb337bf085e"
  }
}
';

        $client = new Client();
        $res = $client->post(TEST_IDENTITY_ENDPOINT . "/v2.0/tokens", [
            'body' => $secret
        ]);
    }
}
