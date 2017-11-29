<?php 

namespace Kiwi26\Tests\StockHTTPClient;

use Kiwi26\LINEBotTestHelper\StockHTTPClient\StockHTTPClient;

class StockHTTPClientTest extends \PHPUnit_Framework_TestCase{
    public function testGet() {
        $client = new StockHTTPClient('channel-token');
        $url = 'http://example.com/get?key=value';
        $res = $client->get($url);
        
        $this->assertEquals(count($client->queue), 1);
        $this->assertEquals($client->queue[0]->method, 'GET');
        $this->assertEquals($client->queue[0]->url, $url);
        $this->assertEmpty($client->queue[0]->body);
    }

    public function testPost() {
        $client = new StockHTTPClient('channel-token');
        $url = 'http://example.com/post';
        $data = ['key' => 123, 'value' => 'hoge'];
        $res = $client->post($url, $data);
        
        $this->assertEquals(count($client->queue), 1);
        $this->assertEquals($client->queue[0]->method, 'POST');
        $this->assertEquals($client->queue[0]->url, $url);
        $this->assertEquals(count($client->queue[0]->body), 2);
        foreach ($data as $key => $value) {
            $this->assertEquals($client->queue[0]->body[$key], $value);
        }
    }

}