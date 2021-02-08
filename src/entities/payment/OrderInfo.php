<?php
/**
 * Created date 4/25/2018 11:19 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;

use tsvetkov\telegram_bot\entities\BaseObject;

class OrderInfo extends BaseObject
{
    public array $objectsArray = [
        'shipping_address' => ShippingAddress::class,
    ];
    public string $name;
    public string $phone_number;
    public string $email;
    public ShippingAddress $shipping_address;
}