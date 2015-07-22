<?php

namespace ConoHa\Api;

use ConoHa\Common\Object;
use ConoHa\Exception\HttpErrorException;

class Response extends Object
{
    /**
     * cURL
     *
     * @var resource
     */
    private $curl;

    /**
     * HTTPリクエストヘッダー
     *
     * @var array
     */
    private $request_headers;

    /**
     * HTTPレスポンスヘッダー
     *
     * @var array
     */
    private $response_headers;

    /**
     * HTTPステータスコード
     *
     * @var int
     */
    private $http_code;


    /**
     * HTTPレスポンスBody
     *
     * @var string
     */
    private $body;

    /**
     * HTTPレスポンスBody(JSONの場合)
     *
     * @var stdClass $json
     */
    private $json;


    public function __construct($curl, $response)
    {
        $this->curl = $curl;

        // cURL error
        if( ! $response) {
            $msg = curl_error($curl);
            throw new HttpErrorException(sprintf('cURL error with message. [%s]', $msg));
        }

        // parse response
        $this->parseResponse($response);

        // http error
        $http_code = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
        if($http_code >= 400) {
            $json = $this->getJson();
            if($json) {
                $msg = $json->error->message;
            } else {
                $msg = $this->getBody();
            }

            $ex = new HttpErrorException(sprintf('Server returned %d status code with message. [%s]', $http_code, $msg));
            $ex->setLastResponse($this);
            throw $ex;
        }
    }

    private function parseResponse($response)
    {
        $info = curl_getinfo($this->curl);

        $header2array = function($str_header) {
            $headers = [];
            foreach(explode("\r\n", $str_header) as $line) {
                $cols = explode(": ", $line);
                if(count($cols) != 2) {
                    continue;
                }

                list($name, $value) = $cols;
                $name = strtolower($name);
                $headers[$name] = $value;
            }
            return $headers;
        };

        // HTTPステータスコード
        $this->http_code = $info['http_code'];

        // リクエストヘッダ
        if(isset($info['request_header'])) {
            $this->request_headers = $header2array($info['request_header']);
        } else {
            $this->request_headers = [];
        }

        // レスポンスヘッダ
        $str_header = substr($response, 0, $info['header_size']);
        $this->response_headers = $header2array($str_header);

        // Body
        $this->body = substr($response, $info['header_size']);

        // Body(JSON)
        if(
            isset($this->response_headers['content-type']) &&
            $this->response_headers['content-type'] == 'application/json'
        ) {
            $this->json = json_decode($this->body, false);
        } else {
            $this->json = "";
        }
    }

    /**
     * HTTPステータスコードの取得
     *
     * @return array
     */
    public function getHttpCode()
    {
        return $this->http_code;
    }

    /**
     * リクエストヘッダーの取得
     *
     * @return array
     */
    public function getRequestHeaders()
    {
        return $this->request_headers;
    }

    /**
     * レスポンスヘッダーの取得
     *
     * @return array
     */
    public function getResponseHeaders()
    {
        return $this->response_headers;
    }

    /**
     * bodyの取得
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * jsonの取得
     *
     * @return string
     */
    public function getJson()
    {
        return $this->json;
    }

}
