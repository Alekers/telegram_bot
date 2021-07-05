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
    public string $type = "document";
    public $thumb;
    public bool $disable_content_type_detection;
}