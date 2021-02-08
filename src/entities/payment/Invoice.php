<?php
/**
 * Created date 4/25/2018 11:13 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class Invoice
 * @package tsvetkov\telegram_bot\entities\payment
 */
class Invoice extends BaseObject
{
    public string $title;
    public string $description;
    public string $start_parameter;
    public string $currency;
    public int $total_amount;
}