<?php
/**
 * Created date 4/25/2018 11:22 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class ShippingAddress
 * @package tsvetkov\telegram_bot\entities\payment
 */
class ShippingAddress extends BaseObject
{
    public string $country_code;
    public string $state;
    public string $city;
    public string $street_line1;
    public string $street_line2;
    public string $post_code;
}