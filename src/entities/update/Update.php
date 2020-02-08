<?php
/**
 * Created date 5/5/2018 10:42 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\update;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\callback\CallbackQuery;
use tsvetkov\telegram_bot\entities\inline\ChosenInlineResult;
use tsvetkov\telegram_bot\entities\inline\InlineQuery;
use tsvetkov\telegram_bot\entities\message\Message;
use tsvetkov\telegram_bot\entities\payment\PreCheckoutQuery;
use tsvetkov\telegram_bot\entities\payment\ShippingQuery;
use tsvetkov\telegram_bot\entities\poll\Poll;
use tsvetkov\telegram_bot\entities\poll\PollAnswer;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#update
 *
 * Class Update
 * @package tsvetkov\telegram_bot\entities\update
 */
class Update extends BaseObject
{
    public $objectsArray = [
        'message' => Message::class,
        'edited_message' => Message::class,
        'channel_post' => Message::class,
        'edited_channel_post' => Message::class,
        'inline_query' => InlineQuery::class,
        'chosen_inline_result' => ChosenInlineResult::class,
        'callback_query' => CallbackQuery::class,
        'shipping_query' => ShippingQuery::class,
        'pre_checkout_query' => PreCheckoutQuery::class,
        'poll' => Poll::class,
        'poll_answer' => PollAnswer::class,
    ];

    /** @var int */
    public $update_id;

    /** @var Message|null */
    public $message;

    /** @var Message|null */
    public $edited_message;

    /** @var Message|null */
    public $channel_post;

    /** @var Message|null */
    public $edited_channel_post;

    /** @var InlineQuery|null */
    public $inline_query;

    /** @var ChosenInlineResult|null */
    public $chosen_inline_result;

    /** @var CallbackQuery|null */
    public $callback_query;

    /** @var ShippingQuery|null */
    public $shipping_query;

    /** @var PreCheckoutQuery|null */
    public $pre_checkout_query;

    /** @var Poll|null */
    public $poll;

    /** @var PollAnswer|null */
    public $poll_answer;
}