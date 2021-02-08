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
    public string $point;
    public float $x_shift;
    public float $y_shift;
    public float $scale;
}