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
    public $objectsArray = [
        'from' => User::class,
        'message' => Message::class,
    ];

    /** @var string */
    public $id;

    /** @var User */
    public $from;

    /** @var Message|null */
    public $message;

    /** @var string|null */
    public $inline_message_id;

    /** @var string|null */
    public $chat_instance;

    /** @var string|null */
    public $data;

    /** @var string|null */
    public $game_short_name;
}