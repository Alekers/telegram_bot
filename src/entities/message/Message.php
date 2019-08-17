<?php
/**
 * Created date 4/25/2018 5:11 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\chat\Chat;
use tsvetkov\telegram_bot\entities\keyboard\InlineKeyboardMarkup;
use tsvetkov\telegram_bot\entities\passport\PassportData;
use tsvetkov\telegram_bot\entities\payment\Invoice;
use tsvetkov\telegram_bot\entities\payment\SuccessfulPayment;
use tsvetkov\telegram_bot\entities\poll\Poll;
use tsvetkov\telegram_bot\entities\sticker\Sticker;
use tsvetkov\telegram_bot\entities\user\User;

/**
 * OfficialDocs: https://core.telegram.org/bots/api#message
 *
 * Class Message
 * @package tsvetkov\telegram_bot\entities\message
 */
class Message extends BaseObject
{
    public $objectsArray = [
        'from' => User::class,
        'chat' => Chat::class,
        'forwarded_from' => User::class,
        'forwarded_from_chat' => Chat::class,
        'reply_to_message' => self::class,
        'entities' => [MessageEntity::class],
        'caption_entities' => [MessageEntity::class],
        'audio' => Audio::class,
        'document' => Document::class,
        'animation' => Animation::class,
        'game' => Game::class,
        'photo' => [PhotoSize::class],
        'sticker' => Sticker::class,
        'video' => Video::class,
        'voice' => Voice::class,
        'video_note' => VideoNote::class,
        'contact' => Contact::class,
        'location' => Location::class,
        'venue' => Venue::class,
        'poll' => Poll::class,
        'new_chat_members' => [User::class],
        'left_chat_member' => User::class,
        'new_chat_photo' => [PhotoSize::class],
        'pinned_message' => self::class,
        'invoice' => Invoice::class,
        'successful_payment' => SuccessfulPayment::class,
        'passport_data' => PassportData::class,
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    /** @var integer */
    public $message_id;

    /** @var User */
    public $from;

    /** @var integer */
    public $date;

    /** @var Chat */
    public $chat;

    /** @var User */
    public $forwarded_from;

    /** @var Chat */
    public $forwarded_from_chat;

    /** @var integer */
    public $forwarded_from_message_id;

    /** @var string */
    public $forward_signature;

    /** @var string */
    public $forward_sender_name;

    /** @var integer */
    public $forward_date;

    /** @var Message */
    public $reply_to_message;

    /** @var integer */
    public $edit_date;

    /** @var string */
    public $media_group_id;

    /** @var string */
    public $author_signature;

    /** @var string */
    public $text;

    /** @var MessageEntity[] */
    public $entities;

    /** @var MessageEntity[] */
    public $caption_entities;

    /** @var Audio */
    public $audio;

    /** @var Document */
    public $document;

    /** @var Animation */
    public $animation;

    /** @var Game */
    public $game;

    /** @var PhotoSize[] */
    public $photo;

    /** @var Sticker */
    public $sticker;

    /** @var Video */
    public $video;

    /** @var Voice */
    public $voice;

    /** @var VideoNote */
    public $video_note;

    /** @var string */
    public $caption;

    /** @var Contact */
    public $contact;

    /** @var Location */
    public $location;

    /** @var Venue */
    public $venue;

    /** @var Poll */
    public $poll;

    /** @var User[] */
    public $new_chat_members;

    /** @var User */
    public $left_chat_member;

    /** @var string */
    public $new_chat_title;

    /** @var PhotoSize[] */
    public $new_chat_photo;

    /** @var bool */
    public $delete_chat_photo;

    /** @var bool */
    public $group_chat_created;

    /** @var bool */
    public $supergroup_chat_created;

    /** @var bool */
    public $channel_chat_created;

    /** @var integer */
    public $migrate_to_chat_id;

    /** @var integer */
    public $migrate_from_chat_id;

    /** @var Message */
    public $pinned_message;

    /** @var Invoice */
    public $invoice;

    /** @var SuccessfulPayment */
    public $successful_payment;

    /** @var string */
    public $connected_website;

    /** @var PassportData */
    public $passport_data;

    /** @var InlineKeyboardMarkup */
    public $reply_markup;
}