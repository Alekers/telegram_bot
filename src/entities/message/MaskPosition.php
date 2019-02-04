<?php
/**
 * Created date 4/25/2018 10:24 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class MaskPosition extends BaseObject
{
    /** @var string $point */
    public $point;

    /** @var float $x_shift */
    public $x_shift;

    /** @var float $y_shift */
    public $y_shift;

    /** @var float $scale */
    public $scale;
}