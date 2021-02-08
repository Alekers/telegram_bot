<?php
/**
 * Created date 5/31/2019 4:06 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\payment;


use tsvetkov\telegram_bot\entities\BaseObject;

class ShippingOption extends BaseObject
{
    protected array $objectsArray = [
        'prices' => [LabeledPrice::class],
    ];

    public string $id;
    public string $title;

    /** @var LabeledPrice[] */
    public array $prices = [];
}