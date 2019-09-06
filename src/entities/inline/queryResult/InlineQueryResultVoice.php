<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultvoice
 *
 * Class InlineQueryResultVoice
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultVoice extends InlineQueryResult
{
    /** @var string */
    public $type = 'voice';

    /** @var string */
    public $voice_url;

    /** @var string */
    public $title;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;

    /** @var int */
    public $voice_duration;
}