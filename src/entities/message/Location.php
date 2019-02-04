<?php
/**
 * Created date 4/25/2018 10:57 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class Location extends BaseObject
{
    /** @var float $longitude */
    public $longitude;

    /** @var float $latitude */
    public $latitude;
}