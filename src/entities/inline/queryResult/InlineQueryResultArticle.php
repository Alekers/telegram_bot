<?php

namespace tsvetkov\telegram_bot\entities\inline\queryResult;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#inlinequeryresultarticle
 *
 * Class InlineQueryResultArticle
 * @package tsvetkov\telegram_bot\entities\inline\queryResult
 */
class InlineQueryResultArticle extends InlineQueryResult
{
    /** @var string */
    public $type = 'article';

    /** @var string */
    public $title;

    /** @var string */
    public $url;

    /** @var bool */
    public $hide_url;

    /** @var string */
    public $description;

    /** @var string */
    public $thumb_url;

    /** @var int */
    public $thumb_width;

    /** @var int */
    public $thumb_height;
}