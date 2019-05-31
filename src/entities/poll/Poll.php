<?php
/**
 * Created date 5/31/2019 1:57 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\poll;


use tsvetkov\telegram_bot\entities\BaseObject;

class Poll extends BaseObject
{
    protected $objectsArray = [
        'options' => [PollOption::class],
    ];

    /** @var string */
    public $id;

    /** @var string */
    public $question;

    /** @var PollOption[] */
    public $options;

    /** @var bool */
    public $is_closed;
}