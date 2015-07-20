<?php

namespace ConoHa\Api;

use ConoHa\Common\Object;
use ConoHa\Exception\HttpErrorException;

class Response extends Object
{
    private $curl;
    private $info;
    private $body;
    private $json;

    protected $properties = [
        'headers' => [],
        'body' => null,
        'json' => null,
    ];

    public function __construct($curl, $response)
    {
        $this->curl = $curl;

        // cURL error
        if( ! $response) {
            $msg = curl_error($curl);
            throw new HttpErrorException(sprintf('cURL error with message. [%s]', $msg));
        }

        // initialize property
        $info = curl_getinfo($this->curl);
        foreach($info as $name => $value) {
            $this->properties[$name] = $value;
        }

        // parse response
        $this->parseResponse($response);

        // http error
        if($this->getHttpCode() >= 400) {
            $json = $this->getJson();
            if(isset($json->error->message)) {
                $msg = $json->error->message;
            } else if(isset($json->unauthorized->message)) {
                $msg = $json->unauthorized->message;
            } else {
                $msg = $this->getBody();
            }

            $ex = new HttpErrorException(sprintf('Server returned %d status code with message. [%s]', $this->getHttpCode(), $msg));
            $ex->setLastResponse($this);
            throw $ex;
        }
    }

    private function parseResponse($response)
    {
        $header_size = curl_getinfo($this->curl, CURLINFO_HEADER_SIZE);
        $header_string = substr($response, 0, $header_size);

        $this->properties['headers'] = [];
        foreach(explode("\r\n", $header_string) as $line) {
            $cols = explode(": ", $line);
            if(count($cols) != 2) {
                continue;
            }

            list($name, $value) = $cols;
            $name = strtolower($name);
            $this->properties['headers'][$name] = $value;
        }

        $this->properties['body'] = substr($response, $header_size);

        if(
            isset($this->getHeaders()['content-type']) &&
            $this->getHeaders()['content-type'] == 'application/json'
        ) {
            $this->properties['json'] = json_decode($this->properties['body'], false);
        } else {
            $this->properties['json'] = "";
        }
    }
}
