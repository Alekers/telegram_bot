<?php

namespace tsvetkov\telegram_bot\entities\inputMedia;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inputmedia
 *
 * Class InputMedia
 * @package tsvetkov\telegram_bot\entities\inputMedia
 */
abstract class InputMedia extends BaseObject
{
    public string $type;
    public string $media;
    public ?string $caption = null;
    public ?string $parse_mode = null;
}