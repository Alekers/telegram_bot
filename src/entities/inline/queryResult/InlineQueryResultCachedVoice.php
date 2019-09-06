<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultcachedvoice
 *
 * Class InlineQueryResultCachedVoice
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultCachedVoice extends InlineQueryResult
{
    /** @var string */
    public $type = 'voice';

    /** @var string */
    public $voice_file_id;

    /** @var string */
    public $title;

    /** @var string */
    public $caption;

    /** @var string */
    public $parse_mode;
}