<?php

namespace Kiwi26\LINEBotTestHelper\WebhookEvent;

/**
* Utility class for EventSource.
* 
*
* @package Kiwi26\LINEBotTestHelper\WebhookEvent
*/

abstract class EventSource
{
    /**
    * Create user event source.
    *
    * @param string $userId User ID.
    * @return array Array for event source request.
    */
    static function user(string $userId) {
        return [
            'type' => 'user',
            'userId' => $userId
        ];
    }

    /**
    * Create group event source.
    *
    * @param string $groupId Group ID.
    * @param string $userId User ID.
    * @return array Array for event source request.
    */
    static function group(string $groupId, string $userId) {
        return [
            'type' => 'group',
            'groupId' => $groupId,
            'userId' => $userId
        ];
    }

    /**
    * Create room event source.
    *
    * @param string $roomId Room ID.
    * @param string $userId User ID.
    * @return array Array for event source request.
    */
    static function room(string $roomId, string $userId) {
        return [
            'type' => 'room',
            'roomId' => $roomId,
            'userId' => $userId
        ];
    }
}
