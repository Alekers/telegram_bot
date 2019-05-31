<?php
/**
 * Created date 5/31/2019 1:58 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\poll;


use tsvetkov\telegram_bot\entities\BaseObject;

class PollOption extends BaseObject
{
    /** @var string */
    public $text;

    /** @var int */
    public $voter_count;
}