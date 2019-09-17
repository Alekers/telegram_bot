<?php

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#maskposition
 *
 * Class MaskPosition
 * @package tsvetkov\telegram_bot\entities\message
 */
class MaskPosition extends BaseObject
{
    /** @var string */
    public $point;

    /** @var float */
    public $x_shift;

    /** @var float */
    public $y_shift;

    /** @var float */
    public $scale;
}