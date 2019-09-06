<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\inputMessage\InputMessageContent;
use tsvetkov\telegram_bot\entities\keyboard\InlineKeyboardMarkup;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresult
 *
 * Class InlineQueryResult
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
abstract class InlineQueryResult extends BaseObject
{
    protected $objectsArray = [
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    /** @var string */
    public $type;

    /** @var string */
    public $id;

    /** @var InputMessageContent */
    public $input_message_content;

    /** @var InlineKeyboardMarkup */
    public $reply_markup;
}