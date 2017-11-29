<?php

namespace Kiwi26\LINEBotTestHelper;

/**
* Abstract class WebhookEvent.
*
* Implementations are in WebhookEvent namespace.
*
* @package Kiwi26\LINEBotTestHelper
*/

abstract class WebhookEvent
{
    /** @var array */
    protected $source;
    /** @var array */
    protected $message;
    /** @var string */
    protected $channelSecret;
    /** @var string */
    protected $replyToken;

    /**
    * Build webhook event and return signature.
    * Original webhook request header has this signature.
    *
    * @return String signature.
    */
    public function signature() {
        return base64_encode(hash_hmac('sha256', $this->body(), $this->channelSecret, true));
    }

    /**
    * Build webhook event and return body.
    * Original webhook request body has this signature.
    *
    * @return String json encoded body.
    */
    public function body() {
        $event = [];
        if (!empty($this->replyToken)) {
            $event['replyToken'] = $this->replyToken;
        }
        $event['type'] = $this->eventType();
        $event['timestamp'] = time();
        $event['source'] = $this->source;
        $event['message'] = $this->message;
        $result = ['events' => [$event]];
        return json_encode($result);
    }

    abstract protected function eventType(); 
}
