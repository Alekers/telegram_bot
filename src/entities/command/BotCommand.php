<?php

namespace tsvetkov\telegram_bot\entities\command;

use tsvetkov\telegram_bot\entities\BaseObject;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#botcommand
 *
 * Class BotCommand
 * @package tsvetkov\telegram_bot\entities\command
 */
class BotCommand extends BaseObject
{
    public string $command;
    public string $description;
}