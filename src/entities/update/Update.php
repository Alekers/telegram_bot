<?php
/**
 * Created date 5/5/2018 10:42 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\update;


use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\message\CallbackQuery;
use tsvetkov\telegram_bot\entities\message\Message;

class Update extends BaseObject
{
    // TODO
    public $objectsArray = [
        'message' => Message::class,
        'edited_message' => Message::class,
        'channel_post' => Message::class,
        'edited_channel_post' => Message::class,
//        'inline_query' => InlineQuery::class,
//        'chosen_inline_result' => ChosenInlineResult::class,
        'callback_query' => CallbackQuery::class,
//        'shipping_query' => ShippingQuery::class,
//        'pre_checkout_query' => PreCheckoutQuery::class,
    ];

    /** @var int $update_id */
    public $update_id;

    /** @var Message $message */
    public $message;

    /** @var Message $edited_message */
    public $edited_message;

    /** @var Message $channel_post */
    public $channel_post;

    /** @var Message $edited_channel_post */
    public $edited_channel_post;

//    /** @var InlineQuery $inline_query */
//    public $inline_query;

//    /** @var ChosenInlineResult $chosen_inline_result */
//    public $chosen_inline_result;

    /** @var CallbackQuery $callback_query */
    public $callback_query;

//    /** @var ShippingQuery $callback_query */
//    public $shipping_query;

//    /** @var PreCheckoutQuery $pre_checkout_query */
//    public $pre_checkout_query;
}