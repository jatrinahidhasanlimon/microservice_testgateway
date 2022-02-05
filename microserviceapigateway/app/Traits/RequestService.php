<?php

declare(strict_types = 1);

namespace App\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
// use GuzzleHttp\Exception\BadResponseException;
// use GuzzleHttp\Psr7;
// use GuzzleHttp\Exception\ClientException;

// use GuzzleHttp\Exception\ConnectException;
trait RequestService
{
    /**
     * @param       $method
     * @param       $requestUrl
     * @param array $formParams
     * @param array $headers
     *
     * @return string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function request($method, $requestUrl, $formParams = [], $headers = []) : string
    {
        // dd($this->secret);
        $client = new Client([
            'base_uri' => $this->baseUri
        ]);
        if (isset($this->secret)) {
            $headers['Authorization'] = $this->secret;
        }
        // new code
        try {
             $response = $client->request($method, $requestUrl,
                [
                    'form_params' => $formParams,
                    'headers' => $headers
                ]
            );
            // dd($response->getBody()->getContents());
            return $response->getBody()->getContents();
        }catch ( RequestException $e) {
            return $e->getMessage();
        } 

    }
}
