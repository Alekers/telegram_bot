<?php
/**
 * Created date 5/31/2019 4:06 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;


use tsvetkov\telegram_bot\entities\BaseObject;

class ShippingOption extends BaseObject
{
    protected $objectsArray = [
        'prices' => [LabeledPrice::class],
    ];

    /** @var string */
    public $id;

    /** @var string */
    public $title;

    /** @var LabeledPrice[] */
    public $prices = [];
}