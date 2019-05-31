<?php
/**
 * Created date 4/25/2018 11:22 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;

use tsvetkov\telegram_bot\entities\BaseObject;

class ShippingAddress extends BaseObject
{
    /** @var string $country_code */
    public $country_code;

    /** @var string $state */
    public $state;

    /** @var string $city */
    public $city;

    /** @var string $street_line1 */
    public $street_line1;

    /** @var string $street_line2 */
    public $street_line2;

    /** @var string $post_code */
    public $post_code;
}