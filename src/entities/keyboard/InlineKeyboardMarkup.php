<?php

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinekeyboardmarkup
 *
 * Class InlineKeyboardMarkup
 * @package tsvetkov\telegram_bot\entities\keyboard
 */
class InlineKeyboardMarkup extends BaseObject
{
    protected array $objectsArray = [
        'inline_keyboard' => [[InlineKeyboardButton::class]],
    ];

    /** @var InlineKeyboardButton[][] */
    public array $inline_keyboard;
}