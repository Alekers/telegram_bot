<?php
/**
 * Created date 5/31/2019 3:45 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;


use tsvetkov\telegram_bot\entities\BaseObject;

class LabeledPrice extends BaseObject
{
    /** @var string */
    public $label;

    /** @var int */
    public $amount;
}