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
    public string $type = "audio";
    public $thumb;
}