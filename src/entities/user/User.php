<?php
/**
 * Created date 4/25/2018 5:23 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\user;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * Class User
 * @package tsvetkov\telegram_bot\entities\user
 */
class User extends BaseObject
{
    public int $id;
    public bool $is_bot;
    public string $first_name;
    public ?string $last_name = null;
    public ?string $username = null;
    public ?string $language_code = null;
    public ?bool $can_join_groups = null;
    public ?bool $can_read_all_group_messages = null;
    public ?bool $supports_inline_queries = null;
}