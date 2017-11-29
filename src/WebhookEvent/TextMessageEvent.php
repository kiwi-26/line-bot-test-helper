<?php

namespace Kiwi26\LINEBotTestHelper\WebhookEvent;

use Kiwi26\LINEBotTestHelper\WebhookEvent;

/**
* Class MessageEvent.
*
* Implementations are in MessageEvent namespace.
*
* @package Kiwi26\LINEBotTestHelper\StockHTTPClient
*/

class TextMessageEvent extends WebhookEvent
{
    function __construct(array $source, string $text, string $channelSecret = 'dummy-channel-secret') {
        $this->source = $source;

        $this->message = [
            'id' => '123456',
            'type' => 'text',
            'text' => $text
        ];

        $this->channelSecret = $channelSecret;
        $this->replyToken = 'dummy-reply-token';
    }

    protected function eventType() {
        return 'message';
    }
}
