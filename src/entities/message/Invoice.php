<?php
/**
 * Created date 4/25/2018 11:13 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class Invoice extends BaseObject
{
    /** @var string $title */
    public $title;

    /** @var string $description */
    public $description;

    /** @var string $start_parameter */
    public $start_parameter;

    /** @var string $currency */
    public $currency;

    /** @var integer $total_amount */
    public $total_amount;
}