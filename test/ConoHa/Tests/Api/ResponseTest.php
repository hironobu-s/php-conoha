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
        curl_setopt($this->curl, CURLOPT_URL, TEST_IDENTITY_ENDPOINT);

        $res = curl_exec($this->curl);
        $r = new Response($this->curl, $res);

        $this->assertInstanceOf('ConoHa\Api\Response', $r);
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
        curl_setopt($this->curl, CURLOPT_URL, TEST_IDENTITY_ENDPOINT . "/foobar");

        try {
            $res = curl_exec($this->curl);
            $r = new Response($this->curl, $res);

        } catch(\Exception $ex) {
            $res = $ex->getLastResponse();
            $this->assertEquals(404, $res->getHttpCode());

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
