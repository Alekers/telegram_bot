<?php

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#replykeyboardmarkup
 *
 * Class ReplyKeyboardMarkup
 * @package tsvetkov\telegram_bot\entities\keyboard
 */
class ReplyKeyboardMarkup extends BaseObject
{
    protected array $objectsArray = [
        'keyboard' => [[KeyboardButton::class]],
    ];

    /** @var KeyboardButton[][] */
    public $keyboard;

    /** @var bool|null */
    public $resize_keyboard;

    /** @var bool|null */
    public $one_time_keyboard;

    /** @var bool|null */
    public $selective;
}