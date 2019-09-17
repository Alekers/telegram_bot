<?php

namespace tsvetkov\telegram_bot\entities\inputMedia;

/**
 * Class InputMediaDocument
 * @package tsvetkov\telegram_bot\entities\inputMedia
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediadocument
 */
class InputMediaDocument extends InputMedia
{
    /** @var string */
    public $type = "audio";

    public $thumb;
}