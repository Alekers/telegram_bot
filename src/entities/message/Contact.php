<?php
/**
 * Created date 4/25/2018 10:53 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class Contact extends BaseObject
{
    /** @var string $phone_number */
    public $phone_number;

    /** @var string $first_name */
    public $first_name;

    /** @var string $last_name */
    public $last_name;

    /** @var integer $user_id */
    public $user_id;
}