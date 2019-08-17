<?php
/**
 * Created date 4/26/2018 12:32 AM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

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

    /** @var string */
    public $url;

    /** @var LoginUrl */
    public $login_url;

    /** @var string */
    public $callback_data;

    /** @var string */
    public $switch_inline_query;

    /** @var string */
    public $switch_inline_query_current_chat;


    public $callback_game;

    /** @var boolean */
    public $pay;
}