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
    public array $objectsArray = [
        'from' => User::class,
        'chat' => Chat::class,
        'forward_from' => User::class,
        'forward_from_chat' => Chat::class,
        'reply_to_message' => self::class,
        'via_bot' => User::class,
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
        'dice' => Dice::class,
        'new_chat_members' => [User::class],
        'left_chat_member' => User::class,
        'new_chat_photo' => [PhotoSize::class],
        'pinned_message' => self::class,
        'invoice' => Invoice::class,
        'successful_payment' => SuccessfulPayment::class,
        'passport_data' => PassportData::class,
        'reply_markup' => InlineKeyboardMarkup::class,
    ];

    public int $message_id;
    public ?User $from = null;
    public int $date;
    public Chat $chat;
    public ?User $forward_from = null;
    public ?Chat $forward_from_chat = null;
    public ?int $forward_from_message_id = null;
    public ?string $forward_signature = null;
    public ?string $forward_sender_name = null;
    public ?int $forward_date = null;
    public ?self $reply_to_message = null;
    public ?User $via_bot = null;
    public ?int $edit_date = null;
    public ?string $media_group_id = null;
    public ?string $author_signature = null;
    public ?string $text = null;

    /** @var MessageEntity[] */
    public array $entities;

    /** @var MessageEntity[] */
    public array $caption_entities;
    public ?Audio $audio = null;
    public ?Document $document = null;
    public ?Animation $animation = null;
    public ?Game $game = null;

    /** @var PhotoSize[] */
    public array $photo;
    public ?Sticker $sticker = null;
    public ?Video $video = null;
    public ?Voice $voice = null;
    public ?VideoNote $video_note = null;
    public ?string $caption = null;
    public ?Contact $contact = null;
    public ?Location $location = null;
    public ?Venue $venue = null;
    public ?Poll $poll = null;
    public ?Dice $dice = null;

    /** @var User[] */
    public array $new_chat_members;
    public ?User $left_chat_member = null;
    public ?string $new_chat_title = null;

    /** @var PhotoSize[] */
    public array $new_chat_photo;
    public ?bool $delete_chat_photo = null;
    public ?bool $group_chat_created = null;
    public ?bool $supergroup_chat_created = null;
    public ?bool $channel_chat_created = null;
    public ?int $migrate_to_chat_id = null;
    public ?int $migrate_from_chat_id = null;
    public ?self $pinned_message = null;
    public ?Invoice $invoice = null;
    public ?SuccessfulPayment $successful_payment = null;
    public ?string $connected_website = null;
    public ?PassportData $passport_data = null;
    public ?InlineKeyboardMarkup $reply_markup = null;
}