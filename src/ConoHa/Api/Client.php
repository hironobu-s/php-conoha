<?php

namespace ConoHa\Api;

use ConoHa\Exception\HttpErrorException;

class Client {

    private $token;

    public function getDefaultUserAgent()
    {
        return "PHP-ConoHa API Client";
    }

    /**
     * $args
     * 0 => url
     * 1 => options
     */
    public function __call($method, $args)
    {
        return $this->send($method, $args);
    }

    public function setApiToken($token)
    {
        $this->token = $token;
    }

    protected function getUserAgent()
    {
        return 'PHP-ConoHa API Client';
    }

    private function send($method, $args)
    {
        $url = $args[0];
        $options = isset($args[1]) ? $args[1] : [];

        $curl = $this->initializeCurl($method, $url, $options);

        $response = curl_exec($curl);
        $res = new Response($curl, $response);

        return $res;
    }

    private function initializeCurl($method, $uri, $options)
    {
        $curl = curl_init();

        // URL
        curl_setopt($curl, CURLOPT_URL, $uri);

        // method
        $method = strtoupper($method);
        switch($method) {
            case "HEAD":
            case "GET":
            case "POST":
            case "PUT":
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
                if(isset($options['json_body'])) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($options['json_body']));
                } else if(isset($options['body'])) {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $options['body']);
                }
                break;
            default:
                throw new HttpErrorException('Unknown http method. [' . $method . ']');
        }

        // HTTP Header
        $headers = [
            'User-Agent: ' . $this->getUserAgent(),
        ];


        if($this->token) {
            $headers[] = 'X-Auth-Token: ' . $this->token;
        }

        if(isset($options['headers']) && is_array($options['headers'])) {
            foreach($options['headers'] as $k => $v) {
                $headers[] = "$k: $v";
            }
        }
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        // debug
        // CURLOPT_VERBOSE と　CURLINFO_HEADER_OUT は排他利用のようなので、
        // デバッグを有効にする場合はCURLINFO_HEADER_OUTをOFFにする。
        if(isset($options['debug']) && $options['debug']) {
            curl_setopt($curl, CURLOPT_VERBOSE, true);

            if(is_resource($options['debug'])) {
                curl_setopt($curl, CURLOPT_STDERR, $options['debug']);
            }

        } else {
            curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        }

        // other options
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_HEADER, true);

        return $curl;
    }
}
