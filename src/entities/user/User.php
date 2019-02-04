<?php
/**
 * Created date 4/25/2018 5:23 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\user;

use tsvetkov\telegram_bot\entities\BaseObject;

class User extends BaseObject
{
    /** @var integer $id */
    public $id;

    /** @var bool $is_bot */
    public $is_bot;

    /** @var string $first_name */
    public $first_name;

    /** @var string $last_name */
    public $last_name;

    /** @var string $username */
    public $username;

    /** @var string $language_code */
    public $language_code;
}