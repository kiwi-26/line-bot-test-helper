<?php

namespace Kiwi26\LINEBotTestHelper\WebhookEvent;

use Kiwi26\LINEBotTestHelper\WebhookEvent;

/**
* Class JoinEvent.
*
* @package Kiwi26\LINEBotTestHelper\WebhookEvent
*/

class JoinEvent extends WebhookEvent
{
    function __construct(array $source, string $channelSecret = 'dummy-channel-secret') {
        $this->source = $source;
        $this->channelSecret = $channelSecret;
        $this->replyToken = 'dummy-reply-token';
    }

    protected function eventType() {
        return 'join';
    }
}
