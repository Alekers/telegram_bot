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
    /** @var string */
    public $type;

    /** @var string */
    public $media;

    /** @var string|null */
    public $caption;

    /** @var string|null */
    public $parse_mode;
}