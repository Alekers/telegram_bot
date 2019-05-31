<?php
/**
 * Created date 4/26/2018 12:44 AM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\callback;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\Message;
use tsvetkov\telegram_bot\entities\user\User;

class CallbackQuery extends BaseObject
{
    public $objectsArray = [
        'from' => User::class,
        'message' => Message::class,
    ];

    /** @var string $id */
    public $id;

    /** @var \tsvetkov\telegram_bot\entities\user\User $from */
    public $from;

    /** @var Message $message */
    public $message;

    /** @var string $inline_message_id */
    public $inline_message_id;

    /** @var string $chat_instance */
    public $chat_instance;

    /** @var string $data */
    public $data;

    /** @var string $game_short_name */
    public $game_short_name;
}