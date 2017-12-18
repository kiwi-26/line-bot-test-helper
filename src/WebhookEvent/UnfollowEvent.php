<?php

namespace Kiwi26\LINEBotTestHelper\WebhookEvent;

use Kiwi26\LINEBotTestHelper\WebhookEvent;

/**
* Class UnfollowEvent.
*
* @package Kiwi26\LINEBotTestHelper\WebhookEvent
*/

class UnfollowEvent extends WebhookEvent
{
    function __construct(array $source, string $channelSecret = 'dummy-channel-secret') {
        $this->source = $source;
        $this->channelSecret = $channelSecret;
    }

    protected function eventType() {
        return 'unfollow';
    }
}
