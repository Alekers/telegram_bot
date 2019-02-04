<?php
/**
 * Created date 4/26/2018 12:51 AM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;

class ForceReply extends BaseObject
{
    /** @var boolean $force_reply */
    public $force_reply;

    /** @var boolean $selective */
    public $selective;
}