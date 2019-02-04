<?php
/**
 * Created date 4/26/2018 12:58 AM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\chat;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\user\User;

class ChatMember extends BaseObject
{
    const STATUS_CREATOR = 'creator';
    const STATUS_ADMINISTRATOR = 'administrator';
    const STATUS_MEMBER = 'member';
    const STATUS_RESTRICTED = 'restricted';
    const STATUS_LEFT = 'left';
    const STATUS_KICKED = 'kicked';

    public $objectsArray = [
        'user' => User::class,
    ];

    /** @var User $user */
    public $user;

    /** @var string $status */
    public $status;
}