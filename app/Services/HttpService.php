<?php

namespace App\Services;

class HttpService implements \Psr\Http\Client\ClientInterface
{
    public function __call()
    {
        //some code for process http requests and use sendRequest method
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
       //some code for process sending request
    }
}
