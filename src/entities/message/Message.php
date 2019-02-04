<?php
/**
 * Created date 4/25/2018 5:11 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\message;

use tsvetkov\telegram_bot\entities\BaseObject;
use tsvetkov\telegram_bot\entities\chat\Chat;
use tsvetkov\telegram_bot\entities\sticker\Sticker;
use tsvetkov\telegram_bot\entities\user\User;

class Message extends BaseObject
{
    public $objectsArray = [
        'from' => User::class,
        'chat' => Chat::class,
        'forwarded_from' => User::class,
        'forwarded_from_chat' => Chat::class,
        'reply_to_message' => self::class,
        'audio' => Audio::class,
        'document' => Document::class,
        'game' => Game::class,
        'sticker' => Sticker::class,
        'video' => Video::class,
        'voice' => Voice::class,
        'video_note' => VideoNote::class,
        'contact' => Contact::class,
        'location' => Location::class,
        'venue' => Venue::class,
        'left_chat_member' => User::class,
        'pinned_message' => self::class,
        'invoice' => Invoice::class,
        'successful_payment' => SuccessfulPayment::class,
    ];

    /** @var integer $message_id */
    public $message_id;

    /** @var User $from */
    public $from;

    /** @var integer $date */
    public $date;

    /** @var \tsvetkov\telegram_bot\entities\chat\Chat $chat */
    public $chat;

    /** @var \tsvetkov\telegram_bot\entities\user\User $forwarded_from */
    public $forwarded_from;

    /** @var Chat $forwarded_from_chat */
    public $forwarded_from_chat;

    /** @var integer $forwarded_from_message_id */
    public $forwarded_from_message_id;

    /** @var string $forward_signature */
    public $forward_signature;

    /** @var integer $forward_date */
    public $forward_date;

    /** @var Message $reply_to_message */
    public $reply_to_message;

    /** @var integer $edit_date */
    public $edit_date;

    /** @var string $media_group_id */
    public $media_group_id;

    /** @var string $author_signature */
    public $author_signature;

    /** @var string $text */
    public $text;

    /** @var MessageEntity[] $entities */
    public $entities;

    /** @var MessageEntity[] $caption_entities */
    public $caption_entities;

    /** @var Audio $audio */
    public $audio;

    /** @var Document $document */
    public $document;

    /** @var Game $game */
    public $game;

    /** @var PhotoSize[] */
    public $photo;

    /** @var \tsvetkov\telegram_bot\entities\sticker\Sticker $sticker */
    public $sticker;

    /** @var Video $video */
    public $video;

    /** @var Voice $voice */
    public $voice;

    /** @var VideoNote $video_note */
    public $video_note;

    /** @var string $caption */
    public $caption;

    /** @var Contact $contact */
    public $contact;

    /** @var Location $location */
    public $location;

    /** @var Venue $venue */
    public $venue;

    /** @var User[] $new_chat_members */
    public $new_chat_members;

    /** @var \tsvetkov\telegram_bot\entities\user\User $left_chat_member */
    public $left_chat_member;

    /** @var string $new_chat_title */
    public $new_chat_title;

    /** @var PhotoSize[] $new_chat_photo */
    public $new_chat_photo;

    /** @var bool $delete_chat_photo */
    public $delete_chat_photo;

    /** @var bool $group_chat_created */
    public $group_chat_created;

    /** @var bool $supergroup_chat_created */
    public $supergroup_chat_created;

    /** @var bool $channel_chat_created */
    public $channel_chat_created;

    /** @var integer $migrate_to_chat_id */
    public $migrate_to_chat_id;

    /** @var integer $migrate_from_chat_id */
    public $migrate_from_chat_id;

    /** @var Message $pinned_message */
    public $pinned_message;

    /** @var Invoice $invoice */
    public $invoice;

    /** @var SuccessfulPayment $successful_payment */
    public $successful_payment;

    /** @var string $connected_website */
    public $connected_website;
}