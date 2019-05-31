<?php
/**
 * Created date 4/26/2018 12:32 AM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\keyboard;

use tsvetkov\telegram_bot\entities\BaseObject;

class InlineKeyboardButton extends BaseObject
{
    /** @var string $text */
    public $text;

    /** @var string $url */
    public $url;

    /** @var string $callback_data */
    public $callback_data;

    /** @var string $switch_inline_query */
    public $switch_inline_query;

    /** @var string $switch_inline_query_current_chat */
    public $switch_inline_query_current_chat;


    public $callback_game;

    /** @var boolean $pay */
    public $pay;
}