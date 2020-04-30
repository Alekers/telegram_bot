<?php

namespace tsvetkov\telegram_bot\entities\message;

/**
 * Class ParseMode
 * @package tsvetkov\telegram_bot\entities\message
 */
class ParseMode
{
    /** @link https://core.telegram.org/bots/api#html-style */
    const HTML = 'HTML';

    /**
     * @link https://core.telegram.org/bots/api#markdown-style
     * @deprecated Saved for BC, use MARKDOWN_V2 instead
     */
    const MARKDOWN = 'Markdown';

    /** @link https://core.telegram.org/bots/api#markdownv2-style */
    const MARKDOWN_V2 = 'MarkdownV2';
}