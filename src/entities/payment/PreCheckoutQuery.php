<?php
/**
 * Created date 5/31/2019 4:14 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;


use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

class PreCheckoutQuery extends BaseObject
{
    protected array $objectsArray = [
        'from' => User::class,
        'order_info' => OrderInfo::class,
    ];

    /** @var string */
    public $id;

    /** @var User */
    public $from;

    /** @var string */
    public $currency;

    /** @var int */
    public $total_amount;

    /** @var string */
    public $invoice_payload;

    /** @var string */
    public $shipping_option_id;

    /** @var OrderInfo */
    public $order_info;
}