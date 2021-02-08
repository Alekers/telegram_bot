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
    public array $keyboard;
    public ?bool $resize_keyboard = null;
    public ?bool $one_time_keyboard = null;
    public ?bool $selective = null;
}