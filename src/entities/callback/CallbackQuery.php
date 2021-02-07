<?php

namespace tsvetkov\telegram_bot\entities\callback;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Message;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#callbackquery
 *
 * Class CallbackQuery
 * @package tsvetkov\telegram_bot\entities\callback
 */
class CallbackQuery extends BaseObject
{
    public array $objectsArray = [
        'from' => User::class,
        'message' => Message::class,
    ];

    public string $id;
    public User $from;
    public ?Message $message = null;
    public ?string $inline_message_id = null;
    public ?string $chat_instance = null;
    public ?string $data = null;
    public ?string $game_short_name = null;
}