<?php
/**
 * Created date 4/25/2018 5:11 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\chat\Chat;
use tsvetkov\telegram_bot\entities\game\Game;
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
        'forward_from' => User::class,
        'forward_from_chat' => Chat::class,
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

    /** @var int */
    public $message_id;

    /** @var User|null */
    public $from;

    /** @var int */
    public $date;

    /** @var Chat */
    public $chat;

    /** @var User|null */
    public $forward_from;

    /** @var Chat|null */
    public $forward_from_chat;

    /** @var int|null */
    public $forward_from_message_id;

    /** @var string|null */
    public $forward_signature;

    /** @var string|null */
    public $forward_sender_name;

    /** @var int|null */
    public $forward_date;

    /** @var self|null */
    public $reply_to_message;

    /** @var int|null */
    public $edit_date;

    /** @var string|null */
    public $media_group_id;

    /** @var string|null */
    public $author_signature;

    /** @var string|null */
    public $text;

    /** @var MessageEntity[] */
    public $entities;

    /** @var MessageEntity[] */
    public $caption_entities;

    /** @var Audio|null */
    public $audio;

    /** @var Document|null */
    public $document;

    /** @var Animation|null */
    public $animation;

    /** @var Game|null */
    public $game;

    /** @var PhotoSize[] */
    public $photo;

    /** @var Sticker|null */
    public $sticker;

    /** @var Video|null */
    public $video;

    /** @var Voice|null */
    public $voice;

    /** @var VideoNote|null */
    public $video_note;

    /** @var string|null */
    public $caption;

    /** @var Contact|null */
    public $contact;

    /** @var Location|null */
    public $location;

    /** @var Venue|null */
    public $venue;

    /** @var Poll|null */
    public $poll;

    /** @var User[] */
    public $new_chat_members;

    /** @var User|null */
    public $left_chat_member;

    /** @var string|null */
    public $new_chat_title;

    /** @var PhotoSize[] */
    public $new_chat_photo;

    /** @var bool|null */
    public $delete_chat_photo;

    /** @var bool|null */
    public $group_chat_created;

    /** @var bool|null */
    public $supergroup_chat_created;

    /** @var bool|null */
    public $channel_chat_created;

    /** @var int|null */
    public $migrate_to_chat_id;

    /** @var int|null */
    public $migrate_from_chat_id;

    /** @var Message|null */
    public $pinned_message;

    /** @var Invoice|null */
    public $invoice;

    /** @var SuccessfulPayment|null */
    public $successful_payment;

    /** @var string|null */
    public $connected_website;

    /** @var PassportData|null */
    public $passport_data;

    /** @var InlineKeyboardMarkup|null */
    public $reply_markup;
}