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
    public string $type = 'article';
    public string $title;
    public string $url;
    public bool $hide_url;
    public string $description;
    public string $thumb_url;
    public int $thumb_width;
    public int $thumb_height;
}