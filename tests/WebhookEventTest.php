<?php 

namespace Kiwi26\Tests\WebhookEvent;

use Kiwi26\LINEBotTestHelper\WebhookEvent;
use Kiwi26\LINEBotTestHelper\StockHTTPClient\StockHTTPClient;

use LINE\LINEBot;
use LINE\LINEBot\Event\MessageEvent\TextMessage;

class WebhookEventTest extends \PHPUnit_Framework_TestCase{

    public function testCreateTextMsgEvent() {
        $channelSecret = 'test-channel-secret';
        $source = WebhookEvent\EventSource::user('dummy-user-id');
        $event = new WebhookEvent\TextMessageEvent($source, 'test message', $channelSecret);

        $bot = new LINEBot(new StockHTTPClient('channel-token'), ['channelSecret' => $channelSecret]);
        $eventObject = $bot->parseEventRequest($event->body(), $event->signature());
        $this->assertEquals($eventObject[0]->getType(), 'message');
        $this->assertInstanceOf(TextMessage::class, $eventObject[0]);
        $this->assertEquals($eventObject[0]->getText(), 'test message');
    }
}