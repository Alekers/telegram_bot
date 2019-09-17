<?php
/**
 * Created date 4/25/2018 5:23 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\user;

use tsvetkov\telegram_bot\entities\BaseObject;

class User extends BaseObject
{
    /** @var integer */
    public $id;

    /** @var bool */
    public $is_bot;

    /** @var string */
    public $first_name;

    /** @var string|null */
    public $last_name;

    /** @var string|null */
    public $username;

    /** @var string|null */
    public $language_code;
}