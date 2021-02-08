<?php

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinekeyboardbutton
 *
 * Class InlineKeyboardButton
 * @package tsvetkov\telegram_bot\entities\keyboard
 */
class InlineKeyboardButton extends BaseObject
{
    protected array $objectsArray = [
        'login_url' => LoginUrl::class,
    ];

    public string $text;
    public ?string $url = null;
    public ?LoginUrl $login_url = null;
    public ?string $callback_data = null;
    public ?string $switch_inline_query = null;
    public ?string $switch_inline_query_current_chat = null;
    public $callback_game;
    public ?bool $pay = null;
}