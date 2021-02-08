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
    public array $objectsArray = [
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

    public int $update_id;
    public ?Message $message = null;
    public ?Message $edited_message = null;
    public ?Message $channel_post = null;
    public ?Message $edited_channel_post = null;
    public ?InlineQuery $inline_query = null;
    public ?ChosenInlineResult $chosen_inline_result = null;
    public ?CallbackQuery $callback_query = null;
    public ?ShippingQuery $shipping_query = null;
    public ?PreCheckoutQuery $pre_checkout_query = null;
    public ?Poll $poll = null;
    public ?PollAnswer $poll_answer = null;
}