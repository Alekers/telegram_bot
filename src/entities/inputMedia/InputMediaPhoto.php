<?php

namespace tsvetkov\telegram_bot\entities\inputMedia;

/**
 * Class InputMediaPhoto
 * @package tsvetkov\telegram_bot\entities\message
 *
 * OfficialDocs: https://core.telegram.org/bots/api#inputmediaphoto
 */
class InputMediaPhoto extends InputMedia
{
    public string $type = "photo";
}