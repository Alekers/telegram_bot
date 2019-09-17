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
    protected $objectsArray = [
        'login_url' => LoginUrl::class,
    ];

    /** @var string */
    public $text;

    /** @var string|null */
    public $url;

    /** @var LoginUrl|null */
    public $login_url;

    /** @var string|null */
    public $callback_data;

    /** @var string|null */
    public $switch_inline_query;

    /** @var string|null */
    public $switch_inline_query_current_chat;


    public $callback_game;

    /** @var bool|null */
    public $pay;
}