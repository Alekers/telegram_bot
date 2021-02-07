<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultgame
 *
 * Class InlineQueryResultGame
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultGame extends InlineQueryResult
{
    public string $type = 'game';
    public string $game_short_name;
}