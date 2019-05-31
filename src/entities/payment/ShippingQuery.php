<?php
/**
 * Created date 5/31/2019 4:08 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;


use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

class ShippingQuery extends BaseObject
{
    protected $objectsArray = [
        'from' => User::class,
        'shipping_address' => ShippingAddress::class,
    ];

    /** @var int */
    public $id;

    /** @var User */
    public $from;

    /** @var string */
    public $invoice_payload;

    /** @var ShippingAddress */
    public $shipping_address;
}