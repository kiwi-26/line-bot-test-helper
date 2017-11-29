<?php

namespace Kiwi26\LINEBotTestHelper\StockHTTPClient;

use LINE\LINEBot\HTTPClient;
use LINE\LINEBot\Response;

/**
* Class StockHTTPClient.
*
* A HTTPClient to test bot program.
* This client stocks sent request and return some response.
*
* @package Kiwi26\LINEBotTestHelper\StockHTTPClient
*/

class StockHTTPClient implements HTTPClient
{
    /** @var array */
    public $queue;

    /**
     * StockHTTPClient constructor.
     *
     * @param string $channelToken Access token of your channel.
     */
    public function __construct($channelToken)
    {
        $this->queue = [];
    }
    /**
     * Sends GET request to LINE Messaging API.
     *
     * @param string $url Request URL.
     * @return Response Response of API request.
     */
    public function get($url)
    {
        return $this->sendRequest('GET', $url, []);
    }
    /**
     * Sends POST request to LINE Messaging API.
     *
     * @param string $url Request URL.
     * @param array $data Request body.
     * @return Response Response of API request.
     */
    public function post($url, array $data)
    {
        return $this->sendRequest('POST', $url, $data);
    }
    /**
     * @param string $method
     * @param string $url
     * @param array $reqBody
     * @return Response
     */
    private function sendRequest($method, $url, array $reqBody)
    {
        $item = new QueueItem();
        $item->method = $method;
        $item->url = $url;
        $item->body = $reqBody;
        $this->queue[] = $item;

        return new Response(200, '', []);
    }
}

class QueueItem {
    public $method = '';
    public $url = '';
    public $body = [];
}