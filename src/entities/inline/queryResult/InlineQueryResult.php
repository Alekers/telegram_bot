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
    protected array $objectsArray = [
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    public string $type;
    public string $id;
    public InputMessageContent $input_message_content;
    public InlineKeyboardMarkup $reply_markup;
}