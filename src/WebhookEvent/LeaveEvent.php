<?php

namespace Kiwi26\LINEBotTestHelper\WebhookEvent;

use Kiwi26\LINEBotTestHelper\WebhookEvent;

/**
* Class LeaveEvent.
*
* @package Kiwi26\LINEBotTestHelper\WebhookEvent
*/

class LeaveEvent extends WebhookEvent
{
    function __construct(array $source, string $channelSecret = 'dummy-channel-secret') {
        $this->source = $source;
        $this->channelSecret = $channelSecret;
    }

    protected function eventType() {
        return 'leave';
    }
}
