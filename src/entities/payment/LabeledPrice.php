<?php
/**
 * Created date 5/31/2019 3:45 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class LabeledPrice
 * @package tsvetkov\telegram_bot\entities\payment
 */
class LabeledPrice extends BaseObject
{
    public string $label;
    public int $amount;
}