<?php
/**
 * Created date 5/5/2018 10:21 PM
 *
 * TODO - change author e-mail
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot;

use tsvetkov\telegram_bot\entities\chat\Chat;
use tsvetkov\telegram_bot\entities\chat\ChatAction;
use tsvetkov\telegram_bot\entities\chat\ChatMember;
use tsvetkov\telegram_bot\entities\chat\ChatPermissions;
use tsvetkov\telegram_bot\entities\command\BotCommand;
use tsvetkov\telegram_bot\entities\game\GameHighScore;
use tsvetkov\telegram_bot\entities\inline\queryResult\InlineQueryResult;
use tsvetkov\telegram_bot\entities\inputMedia\InputMedia;
use tsvetkov\telegram_bot\entities\keyboard\InlineKeyboardMarkup;
use tsvetkov\telegram_bot\entities\keyboard\ReplyKeyboardMarkup;
use tsvetkov\telegram_bot\entities\keyboard\ReplyKeyboardRemove;
use tsvetkov\telegram_bot\entities\message\DiceType;
use tsvetkov\telegram_bot\entities\message\File;
use tsvetkov\telegram_bot\entities\message\ForceReply;
use tsvetkov\telegram_bot\entities\message\MaskPosition;
use tsvetkov\telegram_bot\entities\message\Message;
use tsvetkov\telegram_bot\entities\message\ParseMode;
use tsvetkov\telegram_bot\entities\passport\errors\PassportElementError;
use tsvetkov\telegram_bot\entities\payment\LabeledPrice;
use tsvetkov\telegram_bot\entities\payment\ShippingOption;
use tsvetkov\telegram_bot\entities\poll\Poll;
use tsvetkov\telegram_bot\entities\poll\PollType;
use tsvetkov\telegram_bot\entities\sticker\StickerSet;
use tsvetkov\telegram_bot\entities\update\Update;
use tsvetkov\telegram_bot\entities\user\User;
use tsvetkov\telegram_bot\entities\user\UserProfilePhotos;
use tsvetkov\telegram_bot\entities\webhook\WebhookInfo;
use tsvetkov\telegram_bot\exceptions\BadRequestException;
use tsvetkov\telegram_bot\exceptions\InvalidTokenException;
use tsvetkov\telegram_bot\exceptions\ForbiddenException;
use tsvetkov\telegram_bot\helpers\JsonHelper;
use function is_null;

class TelegramBot extends BaseBot
{
    /**
     * Official docs: https://core.telegram.org/bots/api#getme
     *
     * @return User|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    public function getMe(): ?User
    {
        $data = $this->makeRequest('getMe');
        if ($data['ok']) {
            return new User($data['result']);
        }
        return null;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#sendmessage
     *
     * @param integer|string $chat_id
     * @param string $text
     *
     * @param string|null $parse_mode @see ParseMode
     *
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     * @param bool|null $disable_web_page_preview
     * @param bool|null $disable_notification
     * @param integer|null $reply_to_message_id
     *
     * @return Message|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    public function sendMessage(
        $chat_id, string $text, ?string $parse_mode = null, $reply_markup = null,
        ?bool $disable_web_page_preview = null, ?bool $disable_notification = null, ?int $reply_to_message_id = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];
        $returnData = $this->makeRequest('sendMessage', $data);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#forwardmessage
     *
     * @param int|string $chat_id
     * @param int|string $from_chat_id
     * @param int $message_id
     * @param bool|null $disable_notification
     *
     * @return Message|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    public function forwardMessage(
        $chat_id, $from_chat_id, int $message_id, ?bool $disable_notification = null
    ): ?Message
    {
        $data = $this->makeRequest('forwardMessage', [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id,
            'disable_notification' => $disable_notification,
        ]);
        if ($data['ok']) {
            return new Message($data['result']);
        }
        return null;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#sendphoto
     *
     * @param integer|string $chat_id
     * @param mixed $photo
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param bool|null $disable_notification
     * @param integer|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    public function sendPhoto(
        $chat_id, $photo, ?string $caption = null, ?string $parse_mode = null, ?bool $disable_notification = null,
        ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];
        $returnData = $this->makeRequest('sendPhoto', $data, ['photo' => $photo]);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#sendaudio
     *
     * @param int|string $chat_id
     * @param mixed $audio
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param int|null $duration
     * @param string|null $performer
     * @param string|null $title
     * @param mixed $thumb
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendAudio(
        $chat_id, $audio, ?string $caption = null, ?string $parse_mode = null, ?int $duration = null,
        ?string $performer = null, ?string $title = null, $thumb = null, ?bool $disable_notification = false,
        ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
            'duration' => $duration,
            'performer' => $performer,
            'title' => $title,
        ];

        $files = ['audio' => $audio];

        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }

        $returnData = $this->makeRequest('sendAudio', $data, $files);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#senddocument
     *
     * @param int|string $chat_id
     * @param mixed $document
     * @param mixed $thumb
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    public function sendDocument(
        $chat_id, $document, $thumb = null, ?string $caption = null, ?string $parse_mode = null,
        ?bool $disable_notification = null, ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];

        $files = ['document' => $document];

        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }

        $returnData = $this->makeRequest('sendDocument', $data, $files);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#setwebhook
     *
     * @param string $url
     * @param int|null $max_connections
     * @param mixed $certificate
     * @param string[]|null $allowed_updates
     *
     * @return bool
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    public function setWebhook(
        string $url, ?int $max_connections = null, $certificate = null, ?array $allowed_updates = null
    ): bool
    {
        $data = [
            'url' => $url,
            'max_connections' => $max_connections,
            'available_updates' => $allowed_updates,
        ];
        $files = [];
        if (!is_null($certificate)) {
            $files['certificate'] = $certificate;
        }
        return $this->makeSimpleRequest('setWebhook', $data, $files);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getwebhookinfo
     *
     * @return WebhookInfo|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    public function getWebhookInfo(): ?WebhookInfo
    {
        $data = $this->makeRequest('getWebhookInfo');
        if ($data['ok']) {
            return new WebhookInfo($data['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#getupdates
     *
     * @param int|null $limit
     * @param int|null $offset
     * @param int|null $timeout
     * @param string[]|null $allowed_updates
     *
     * @return Update[]|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getUpdates(
        ?int $limit = null, ?int $offset = null, ?int $timeout = null, ?array $allowed_updates = null
    ): ?array
    {
        $data = $this->makeRequest('getUpdates', [
            'offset' => $offset,
            'limit' => $limit,
            'timeout' => $timeout,
            'allowed_updates' => $allowed_updates,
        ]);
        if ($data['ok']) {
            $updates = [];
            foreach ($data['result'] as $datum) {
                $updates[] = new Update($datum);
            }
            return $updates;
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendsticker
     *
     * @param string|int $chat_id
     * @param mixed $sticker
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendSticker(
        $chat_id, $sticker, ?bool $disable_notification = null, ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = $this->makeRequest('sendSticker', [
            'chat_id' => $chat_id,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ], ['sticker' => $sticker]);

        if ($data['ok']) {
            return new Message($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#createnewstickerset
     *
     * @param int $user_id
     * @param string $name
     * @param string $title
     * @param string $emojis
     * @param string|null $png_sticker
     * @param mixed $tgs_sticker
     * @param bool|null $contains_masks
     * @param MaskPosition|null $mask_position
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws InvalidTokenException
     */
    public function createNewStickerSet(
        int $user_id, string $name, string $title, string $emojis, ?string $png_sticker = null, $tgs_sticker = null,
        ?bool $contains_masks = null, ?MaskPosition $mask_position = null
    ): bool
    {
        return $this->makeSimpleRequest('createNewStickerSet', [
            'user_id' => $user_id,
            'name' => $name,
            'title' => $title,
            'emojis' => $emojis,
            'contains_masks' => $contains_masks,
            'mask_position' => $mask_position,
        ], [
            'png_sticker' => $png_sticker,
            'tgs_sticker' => $tgs_sticker,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#addstickertoset
     *
     * @param int $user_id
     * @param string $name
     * @param string $png_sticker
     * @param string $emojis
     * @param mixed $tgs_sticker
     * @param MaskPosition|null $mask_position
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function addStickerToSet(
        int $user_id, string $name, string $png_sticker, string $emojis, $tgs_sticker = null,
        ?MaskPosition $mask_position = null
    ): bool
    {
        return $this->makeSimpleRequest('addStickerToSet', [
            'user_id' => $user_id,
            'name' => $name,
            'emojis' => $emojis,
            'mask_position' => $mask_position,
        ], [
            'png_sticker' => $png_sticker,
            'tgs_sticker' => $tgs_sticker,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#deletestickerfromset
     *
     * @param string $sticker
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function deleteStickerFromSet(string $sticker): bool
    {
        return $this->makeSimpleRequest('deleteStickerFromSet', [
            'sticker' => $sticker,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#uploadstickerfile
     *
     * @param int $user_id
     * @param mixed $png_sticker
     *
     * @return File|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function uploadStickerFile(int $user_id, $png_sticker): ?File
    {
        $data = $this->makeRequest('uploadStickerFile', ['user_id' => $user_id], ['png_sticker' => $png_sticker]);
        if ($data['ok']) {
            return new File($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getstickerset
     *
     * @param string $name
     *
     * @return StickerSet|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getStickerSet(string $name): ?StickerSet
    {
        $data = $this->makeRequest('getStickerSet', ['name' => $name]);
        if ($data['ok']) {
            return new StickerSet($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setstickerpositioninset
     *
     * @param string $sticker
     * @param int $position
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setStickerPositionInSet(string $sticker, int $position): bool
    {
        return $this->makeSimpleRequest('setStickerPositionInSet', [
            'sticker' => $sticker,
            'position' => $position,
        ]);
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#deletewebhook
     *
     * @return bool
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    public function deleteWebhook(): bool
    {
        return $this->makeSimpleRequest('deleteWebhook');
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendvideo
     *
     * @param int|string $chat_id
     * @param mixed $video
     * @param int|null $duration
     * @param int|null $width
     * @param int|null $height
     * @param mixed $thumb
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param bool|null $supports_streaming
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendVideo(
        $chat_id, $video, ?int $duration = null, ?int $width = null, ?int $height = null, $thumb = null,
        ?string $caption = null, ?string $parse_mode = null, ?bool $supports_streaming = null,
        ?bool $disable_notification = null, ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'supports_streaming' => $supports_streaming,
        ];
        $files = [
            'video' => $video,
        ];
        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }

        $returnData = $this->makeRequest('sendVideo', $data, $files);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendanimation
     *
     * @param string|int $chat_id
     * @param mixed $animation
     * @param int|null $duration
     * @param int|null $width
     * @param int|null $height
     * @param mixed $thumb
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendAnimation(
        $chat_id, $animation, ?int $duration = null, ?int $width = null, ?int $height = null, $thumb = null,
        ?string $caption = null, ?string $parse_mode = null, ?bool $disable_notification = null,
        ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
        ];

        $files = [
            'animation' => $animation,
        ];
        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }

        $returnData = $this->makeRequest('sendAnimation', $data, $files);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendvoice
     *
     * @param string|int $chat_id
     * @param mixed $voice
     * @param string|null $caption
     * @param string|null $parse_mode
     * @param int|null $duration
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendVoice(
        $chat_id, $voice, ?string $caption = null, ?string $parse_mode = null, ?int $duration = null,
        ?bool $disable_notification = null, ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
            'duration' => $duration,
        ];

        $answer = $this->makeRequest('sendVoice', $data, ['voice' => $voice]);

        if ($answer['ok']) {
            return new Message($answer['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendvideonote
     *
     * @param string|int $chat_id
     * @param mixed $video_note
     * @param int|null $duration
     * @param int|null $length
     * @param mixed $thumb
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendVideoNote(
        $chat_id, $video_note, ?int $duration = null, ?int $length = null, $thumb = null,
        ?bool $disable_notification = null, ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
            'duration' => $duration,
            'length' => $length,
        ];

        $files = [
            'video_note' => $video_note,
        ];
        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }

        $answer = $this->makeRequest('sendVideoNote', $data, $files);

        if ($answer['ok']) {
            return new Message($answer['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendmediagroup
     *
     * @param int|string $chat_id
     * @param array $media array of InputMediaPhoto or InputMediaVideo
     * @param array $files
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendMediaGroup(
        $chat_id, array $media, array $files = [], ?bool $disable_notification = null, ?int $reply_to_message_id = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'media' => JsonHelper::encodeWithoutEmptyProperty($media),
        ];

        $answer = $this->makeRequest('sendMediaGroup', $data, $files);

        if ($answer['ok']) {
            return new Message($answer['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendlocation
     *
     * @param int|string $chat_id
     * @param float $latitude
     * @param float $longitude
     * @param int|null $live_period
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendLocation(
        $chat_id, float $latitude, float $longitude, ?int $live_period = null, ?bool $disable_notification = null,
        ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'live_period' => $live_period,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];

        $returnData = $this->makeRequest('sendLocation', $data);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#editmessagelivelocation
     *
     * @param float $latitude
     * @param float $longitude
     * @param int|string|null $chat_id
     * @param integer|null $message_id
     * @param string|null $inline_message_id
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function editMessageLiveLocation(
        float $latitude, float $longitude, $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null,
        $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'inline_message_id' => $inline_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];

        $returnData = $this->makeRequest('editMessageLiveLocation', $data);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#stopmessagelivelocation
     *
     * @param int|string|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return Message|bool|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function stopMessageLiveLocation(
        $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null,
        ?InlineKeyboardMarkup $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];

        $returnData = $this->makeRequest('stopMessageLiveLocation', $data);
        if ($returnData['ok']) {
            if (is_bool($returnData['result'])) {
                return $returnData['result'];
            } elseif (is_array($returnData['result'])) {
                return new Message($returnData['result']);
            }
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendvenue
     *
     * @param int|string $chat_id
     * @param float $latitude
     * @param float $longitude
     * @param string $title
     * @param string $address
     * @param string|null $foursquare_id
     * @param string|null $foursquare_type
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendVenue(
        $chat_id, float $latitude, float $longitude, string $title, string $address, ?string $foursquare_id = null,
        ?string $foursquare_type = null, ?bool $disable_notification = null, ?int $reply_to_message_id = null,
        $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'title' => $title,
            'address' => $address,
            'foursquare_id' => $foursquare_id,
            'foursquare_type' => $foursquare_type,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];

        $answer = $this->makeRequest('sendVenue', $data);
        if ($answer['ok']) {
            return new Message($answer['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendcontact
     *
     * @param string|int $chat_id
     * @param string $phone_number
     * @param string $first_name
     * @param string|null $last_name
     * @param string|null $vcard
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendContact(
        $chat_id, string $phone_number, string $first_name, ?string $last_name = null, ?string $vcard = null,
        ?bool $disable_notification = null, ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'phone_number' => $phone_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'vcard' => $vcard,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];

        $answer = $this->makeRequest('sendContact', $data);
        if ($answer['ok']) {
            return new Message($answer['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendpoll
     *
     * @param string|int $chat_id
     * @param string $question
     * @param string[] $options
     * @param bool|null $is_anonymous
     * @param string|null $type
     * @param bool|null $allows_multiple_answers
     * @param string|null $explanation
     * @param string|null $explanation_parse_mode
     * @param int|null $correct_option_id
     * @param int|null $open_period
     * @param int|null $close_date
     * @param bool|null $is_closed
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws InvalidTokenException
     * @see PollType
     */
    public function sendPoll(
        $chat_id, string $question, array $options, ?bool $is_anonymous = null, ?string $type = null,
        ?bool $allows_multiple_answers = null, ?string $explanation = null, ?string $explanation_parse_mode = null,
        ?int $correct_option_id = null, ?int $open_period = null, ?int $close_date = null, ?bool $is_closed = null,
        ?bool $disable_notification = null, ?int $reply_to_message_id = null, $reply_markup = null
    ): ?Message
    {
        $data = [
            'chat_id' => $chat_id,
            'question' => $question,
            'options' => JsonHelper::encodeWithoutEmptyProperty($options),
            'is_anonymous' => $is_anonymous,
            'type' => $type,
            'allows_multiple_answers' => $allows_multiple_answers,
            'correct_option_id' => $correct_option_id,
            'is_closed' => $is_closed,
            'explanation' => $explanation,
            'explanation_parse_mode' => $explanation_parse_mode,
            'open_period' => $open_period,
            'close_date' => $close_date,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ];

        $answer = $this->makeRequest('sendPoll', $data);
        if ($answer['ok']) {
            return new Message($answer['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendchataction
     *
     * @see ChatAction for constants of actions
     *
     * @param int|string $chat_id
     * @param string $action
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendChatAction($chat_id, string $action): bool
    {
        return $this->makeSimpleRequest('sendChatAction', [
            'chat_id' => $chat_id,
            'action' => $action,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getuserprofilephotos
     *
     * @param int $user_id
     * @param int|null $offset
     * @param int|null $limit
     *
     * @return UserProfilePhotos|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getUserProfilePhotos(int $user_id, ?int $offset = null, ?int $limit = null): ?UserProfilePhotos
    {
        $answer = $this->makeRequest('getUserProfilePhotos', [
            'user_id' => $user_id,
            'offset' => $offset,
            'limit' => $limit,
        ]);
        if ($answer['ok']) {
            return new UserProfilePhotos($answer['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getfile
     *
     * @param string $file_id
     *
     * @return File|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getFile(string $file_id): ?File
    {
        $answer = $this->makeRequest('getFile', ['file_id' => $file_id]);
        if ($answer['ok']) {
            return new File($answer['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#kickchatmember
     *
     * @param int|string $chat_id
     * @param int $user_id
     * @param int|null $until_date
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function kickChatMember($chat_id, int $user_id, ?int $until_date = null): bool
    {
        return $this->makeSimpleRequest('kickChatMember', [
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'until_date' => $until_date,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#unbanchatmember
     *
     * @param int|string $chat_id
     * @param int $user_id
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function unbanChatMember($chat_id, int $user_id): bool
    {
        return $this->makeSimpleRequest('unbanChatMember', [
            'chat_id' => $chat_id,
            'user_id' => $user_id,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#restrictchatmember
     *
     * @param int|string $chat_id
     * @param int $user_id
     * @param ChatPermissions $permissions
     * @param int|null $until_date
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function restrictChatMember(
        $chat_id, int $user_id, ChatPermissions $permissions, ?int $until_date = null
    ): bool
    {
        return $this->makeSimpleRequest('restrictChatMember', [
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'permissions' => $permissions,
            'until_date' => $until_date,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setchatpermissions
     *
     * @param int|string $chat_id
     * @param ChatPermissions $permissions
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setChatPermissions($chat_id, ChatPermissions $permissions): bool
    {
        return $this->makeSimpleRequest('setChatPermissions', [
            'chat_id' => $chat_id,
            'permissions' => $permissions,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#promotechatmember
     *
     * @param int|string $chat_id
     * @param int $user_id
     * @param bool|null $can_change_info
     * @param bool|null $can_post_messages
     * @param bool|null $can_edit_messages
     * @param bool|null $can_delete_messages
     * @param bool|null $can_invite_users
     * @param bool|null $can_restrict_members
     * @param bool|null $can_pin_messages
     * @param bool|null $can_promote_members
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function promoteChatMember(
        $chat_id, int $user_id, ?bool $can_change_info = null, ?bool $can_post_messages = null,
        ?bool $can_edit_messages = null, ?bool $can_delete_messages = null, ?bool $can_invite_users = null,
        ?bool $can_restrict_members = null, ?bool $can_pin_messages = null, ?bool $can_promote_members = null
    ): bool
    {
        return $this->makeSimpleRequest('promoteChatMember', [
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'can_change_info' => $can_change_info,
            'can_post_messages' => $can_post_messages,
            'can_edit_messages' => $can_edit_messages,
            'can_delete_messages' => $can_delete_messages,
            'can_invite_users' => $can_invite_users,
            'can_restrict_members' => $can_restrict_members,
            'can_pin_messages' => $can_pin_messages,
            'can_promote_members' => $can_promote_members,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#exportchatinvitelink
     *
     * @param int|string $chat_id
     *
     * @return string|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function exportChatInviteLink($chat_id): ?string
    {
        $data = $this->makeRequest('exportChatInviteLink', [
            'chat_id' => $chat_id,
        ]);
        if ($data['ok']) {
            return $data['result'];
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setchatphoto
     *
     * @param int|string $chat_id
     * @param mixed $photo
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setChatPhoto($chat_id, $photo): bool
    {
        return $this->makeSimpleRequest('setChatPhoto', ['chat_id' => $chat_id], ['photo' => $photo]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#deletechatphoto
     *
     * @param int|string $chat_id
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function deleteChatPhoto($chat_id): bool
    {
        return $this->makeSimpleRequest('deleteChatPhoto', ['chat_id' => $chat_id]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setchattitle
     *
     * @param int|string $chat_id
     * @param string $title
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setChatTitle($chat_id, string $title): bool
    {
        return $this->makeSimpleRequest('setChatTitle', ['chat_id' => $chat_id, 'title' => $title]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setchatdescription
     *
     * @param int|string $chat_id
     * @param string|null $description
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setChatDescription($chat_id, ?string $description = null): bool
    {
        return $this->makeSimpleRequest('setChatDescription', ['chat_id' => $chat_id, 'description' => $description]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#pinchatmessage
     *
     * @param int|string $chat_id
     * @param int $message_id
     * @param bool|null $disable_notification
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function pinChatMessage($chat_id, int $message_id, ?bool $disable_notification = null): bool
    {
        return $this->makeSimpleRequest('pinChatMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'disable_notification' => $disable_notification,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#unpinchatmessage
     *
     * @param int|string $chat_id
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function unpinChatMessage($chat_id): bool
    {
        return $this->makeSimpleRequest('unpinChatMessage', ['chat_id' => $chat_id]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#leavechat
     *
     * @param int|string $chat_id
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function leaveChat($chat_id): bool
    {
        return $this->makeSimpleRequest('leaveChat', ['chat_id' => $chat_id]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getchat
     *
     * @param int|string $chat_id
     *
     * @return Chat|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getChat($chat_id): ?Chat
    {
        $data = $this->makeRequest('getChat', ['chat_id' => $chat_id]);
        if ($data['ok']) {
            return new Chat($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getchatadministrators
     *
     * @param int|string $chat_id
     *
     * @return ChatMember[]|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getChatAdministrators($chat_id): ?array
    {
        $data = $this->makeRequest('getChatAdministrators', ['chat_id' => $chat_id]);
        if ($data['ok']) {
            $admins = [];
            foreach ($data['result'] as $datum) {
                $admins[] = new ChatMember($datum);
            }
            return $admins;
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getchatmemberscount
     *
     * @param int|string $chat_id
     *
     * @return int|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getChatMembersCount($chat_id): ?int
    {
        $data = $this->makeRequest('getChatMembersCount', ['chat_id' => $chat_id]);
        if ($data['ok']) {
            return $data['result'];
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getchatmember
     *
     * @param int|string $chat_id
     * @param int $user_id
     *
     * @return ChatMember|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getChatMember($chat_id, int $user_id): ?ChatMember
    {
        $data = $this->makeRequest('getChatMember', ['chat_id' => $chat_id, 'user_id' => $user_id]);
        if ($data['ok']) {
            return new ChatMember($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setchatstickerset
     *
     * @param int|string $chat_id
     * @param string $sticker_set_name
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setChatStickerSet($chat_id, string $sticker_set_name): bool
    {
        return $this->makeSimpleRequest('setChatStickerSet', [
            'chat_id' => $chat_id,
            'sticker_set_name' => $sticker_set_name,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#deletechatstickerset
     *
     * @param int|string $chat_id
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function deleteChatStickerSet($chat_id): bool
    {
        return $this->makeSimpleRequest('deleteChatStickerSet', [
            'chat_id' => $chat_id,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#answercallbackquery
     *
     * @param string $callback_query_id
     * @param string|null $text
     * @param bool|null $show_alert
     * @param string|null $url
     * @param int|null $cache_time
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function answerCallbackQuery(
        string $callback_query_id, ?string $text = null, ?bool $show_alert = null, ?string $url = null,
        ?int $cache_time = null
    ): bool
    {
        return $this->makeSimpleRequest('answerCallbackQuery', [
            'callback_query_id' => $callback_query_id,
            'text' => $text,
            'show_alert' => $show_alert,
            'url' => $url,
            'cache_time' => $cache_time,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#editmessagetext
     *
     * @param string $text
     * @param int|string|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param string|null $parse_mode
     * @param bool|null $disable_web_page_preview
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return Message|bool|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function editMessageText(
        string $text, $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null,
        ?string $parse_mode = null, ?bool $disable_web_page_preview = null, $reply_markup = null
    )
    {
        $data = $this->makeRequest('editMessageText', [
            'text' => $text,
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ]);
        if ($data['ok']) {
            if (is_bool($data['result'])) {
                return $data['result'];
            } elseif (is_array($data['result'])) {
                return new Message($data['result']);
            }
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#editmessagecaption
     *
     * @param string|null $caption
     * @param int|string|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param string|null $parse_mode
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return Message|bool|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function editMessageCaption(
        ?string $caption = null, $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null,
        ?string $parse_mode = null, $reply_markup = null
    )
    {
        $data = $this->makeRequest('editMessageCaption', [
            'caption' => $caption,
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'parse_mode' => $parse_mode,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ]);
        if ($data['ok']) {
            if (is_bool($data['result'])) {
                return $data['result'];
            } elseif (is_array($data['result'])) {
                return new Message($data['result']);
            }
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#editmessagemedia
     *
     * @param InputMedia $media
     * @param int|string|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param InlineKeyboardMarkup|null $reply_markup
     * @param array $files
     *
     * @return bool|Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function editMessageMedia(
        InputMedia $media, $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null,
        ?InlineKeyboardMarkup $reply_markup = null, array $files = []
    )
    {
        $data = $this->makeRequest('editMessageMedia', [
            'media' => JsonHelper::encodeWithoutEmptyProperty($media),
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ], $files);
        if ($data['ok']) {
            if (is_bool($data['result'])) {
                return $data['result'];
            } elseif (is_array($data['result'])) {
                return new Message($data['result']);
            }
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#editmessagereplymarkup
     *
     * @param int|string|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return bool|Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function editMessageReplyMarkup(
        $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null,
        ?InlineKeyboardMarkup $reply_markup = null
    )
    {
        $data = $this->makeRequest('editMessageReplyMarkup', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ]);
        if ($data['ok']) {
            if (is_bool($data['result'])) {
                return $data['result'];
            } elseif (is_array($data['result'])) {
                return new Message($data['result']);
            }
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#stoppoll
     *
     * @param int|string $chat_id
     * @param int $message_id
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return Poll|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function stopPoll($chat_id, int $message_id, ?InlineKeyboardMarkup $reply_markup = null): ?Poll
    {
        $data = $this->makeRequest('stopPoll', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ]);
        if ($data['ok']) {
            return new Poll($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#deletemessage
     *
     * @param int|string $chat_id
     * @param int $message_id
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function deleteMessage($chat_id, int $message_id): bool
    {
        return $this->makeSimpleRequest('deleteMessage', [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendinvoice
     *
     * @param int $chat_id
     * @param string $title
     * @param string $description
     * @param string $payload
     * @param string $provider_token
     * @param string $start_parameter
     * @param string $currency
     * @param LabeledPrice[] $prices
     * @param string|null $provider_data
     * @param string|null $photo_url
     * @param int|null $photo_size
     * @param int|null $photo_width
     * @param int|null $photo_height
     * @param bool|null $need_name
     * @param bool|null $need_phone_number
     * @param bool|null $need_email
     * @param bool|null $need_shipping_address
     * @param bool|null $send_phone_number_to_provider
     * @param bool|null $send_email_to_provider
     * @param bool|null $is_flexible
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendInvoice(
        int $chat_id, string $title, string $description, string $payload, string $provider_token,
        string $start_parameter, string $currency, array $prices, ?string $provider_data = null,
        ?string $photo_url = null, ?int $photo_size = null, ?int $photo_width = null, ?int $photo_height = null,
        ?bool $need_name = null, ?bool $need_phone_number = null, ?bool $need_email = null,
        ?bool $need_shipping_address = null, ?bool $send_phone_number_to_provider = null,
        ?bool $send_email_to_provider = null, ?bool $is_flexible = null, ?bool $disable_notification = null,
        ?int $reply_to_message_id = null, ?InlineKeyboardMarkup $reply_markup = null
    ): ?Message
    {
        $data = $this->makeRequest('sendInvoice', [
            'chat_id' => $chat_id,
            'title' => $title,
            'description' => $description,
            'payload' => $payload,
            'provider_token' => $provider_token,
            'start_parameter' => $start_parameter,
            'currency' => $currency,
            'prices' => $prices,
            'provider_data' => JsonHelper::encodeWithoutEmptyProperty($provider_data),
            'photo_url' => $photo_url,
            'photo_size' => $photo_size,
            'photo_width' => $photo_width,
            'photo_height' => $photo_height,
            'need_name' => $need_name,
            'need_phone_number' => $need_phone_number,
            'need_email' => $need_email,
            'need_shipping_address' => $need_shipping_address,
            'send_phone_number_to_provider' => $send_phone_number_to_provider,
            'send_email_to_provider' => $send_email_to_provider,
            'is_flexible' => $is_flexible,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup ' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ]);
        if ($data['ok']) {
            return new Message($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/answershippingquery#answershippingquery
     *
     * @param string $shipping_query_id
     * @param bool $ok
     * @param ShippingOption[]|null $shipping_options
     * @param string|null $error_message
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function answerShippingQuery(
        string $shipping_query_id, bool $ok, ?array $shipping_options = null, ?string $error_message = null
    ): bool
    {
        return $this->makeSimpleRequest('answerShippingQuery', [
            'shipping_query_id' => $shipping_query_id,
            'ok' => $ok,
            'shipping_options' => $shipping_options,
            'error_message' => $error_message,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/answershippingquery#answerprecheckoutquery
     *
     * @param string $pre_checkout_query_id
     * @param bool $ok
     * @param string|null $error_message
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function answerPreCheckoutQuery(string $pre_checkout_query_id, bool $ok, ?string $error_message = null): bool
    {
        return $this->makeSimpleRequest('answerPreCheckoutQuery', [
            'pre_checkout_query_id' => $pre_checkout_query_id,
            'ok' => $ok,
            'error_message' => $error_message,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setpassportdataerrors
     *
     * @param int $user_id
     * @param PassportElementError[] $errors
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setPassportDataErrors(int $user_id, array $errors): bool
    {
        return $this->makeSimpleRequest('setPassportDataErrors', [
            'user_id' => $user_id,
            'errors' => $errors,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendgame
     *
     * @param int $chat_id
     * @param string $game_short_name
     * @param bool|null $disable_notification
     * @param int|null $reply_to_message_id
     * @param InlineKeyboardMarkup|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function sendGame(
        int $chat_id, string $game_short_name, ?bool $disable_notification = null, ?int $reply_to_message_id = null,
        ?InlineKeyboardMarkup $reply_markup = null
    ): ?Message
    {
        $data = $this->makeRequest('sendGame', [
            'chat_id' => $chat_id,
            'game_short_name' => $game_short_name,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ]);
        if ($data['ok']) {
            return new Message($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setgamescore
     *
     * @param int $user_id
     * @param int $score
     * @param int|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     * @param bool|null $force
     * @param bool|null $disable_edit_message
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setGameScore(
        int $user_id, int $score, ?int $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null,
        ?bool $force = null, ?bool $disable_edit_message = null
    ): ?Message
    {
        $data = $this->makeRequest('sendGame', [
            'user_id' => $user_id,
            'score' => $score,
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'force' => $force,
            'disable_edit_message' => $disable_edit_message,
        ]);
        if ($data['ok']) {
            return new Message($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getgamehighscores
     *
     * @param int $user_id
     * @param int|null $chat_id
     * @param int|null $message_id
     * @param string|null $inline_message_id
     *
     * @return GameHighScore[]|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function getGameHighScores(
        int $user_id, ?int $chat_id = null, ?int $message_id = null, ?string $inline_message_id = null
    ): ?array
    {
        $data = $this->makeRequest('sendGame', [
            'user_id' => $user_id,
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
        ]);
        if ($data['ok']) {
            $resultArray = [];
            foreach ($data['result'] as $result) {
                $resultArray[] = new GameHighScore($result);
            }
            return $resultArray;
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#answerinlinequery
     *
     * @param string $inline_query_id
     * @param InlineQueryResult[] $results
     * @param int|null $cache_time
     * @param bool|null $is_personal
     * @param string|null $next_offset
     * @param string|null $switch_pm_text
     * @param string|null $switch_pm_parameter
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function answerInlineQuery(
        string $inline_query_id, array $results, ?int $cache_time = null, ?bool $is_personal = null,
        ?string $next_offset = null, ?string $switch_pm_text = null, ?string $switch_pm_parameter = null
    ): bool
    {
        return $this->makeSimpleRequest('answerInlineQuery', [
            'inline_query_id' => $inline_query_id,
            'results' => $results,
            'cache_time' => $cache_time,
            'is_personal' => $is_personal,
            'next_offset' => $next_offset,
            'switch_pm_text' => $switch_pm_text,
            'switch_pm_parameter' => $switch_pm_parameter,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setchatadministratorcustomtitle
     *
     * @param int|string $chat_id
     * @param int $user_id
     * @param string $custom_title
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    public function setChatAdministratorCustomTitle($chat_id, int $user_id, string $custom_title): bool
    {
        return $this->makeSimpleRequest('setChatAdministratorCustomTitle', [
            'chat_id' => $chat_id,
            'user_id' => $user_id,
            'custom_title' => $custom_title,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#senddice
     *
     * @param int|string $chat_id
     *
     * @see DiceType
     * @param string|null $emoji
     *
     * @param bool|null $disable_notification
     * @param bool|null $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply|null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws InvalidTokenException
     */
    public function sendDice(
        $chat_id, ?string $emoji = null, ?bool $disable_notification = null, ?bool $reply_to_message_id = null,
        $reply_markup = null
    ): ?Message
    {
        $data = $this->makeRequest('sendDice', [
            'chat_id' => $chat_id,
            'emoji' => $emoji,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => JsonHelper::encodeWithoutEmptyProperty($reply_markup),
        ]);

        if ($data['ok']) {
            return new Message($data['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getmycommands
     *
     * @return BotCommand[]|null
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws InvalidTokenException
     */
    public function getMyCommands(): ?array
    {
        $data = $this->makeRequest('getMyCommands');

        if ($data['ok']) {
            $result = [];
            foreach ($data['result'] as $datum) {
                $result[] = new BotCommand($datum);
            }
            return $result;
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getmycommands
     *
     * @param BotCommand[] $commands
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws InvalidTokenException
     */
    public function setMyCommands(array $commands): bool
    {
        return $this->makeSimpleRequest('setMyCommands', [
            'commands' => JsonHelper::encodeWithoutEmptyProperty($commands),
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#setstickersetthumb
     *
     * @param string $name
     * @param string $user_id
     * @param mixed $thumb
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws ForbiddenException
     * @throws InvalidTokenException
     */
    public function setStickerSetThumb(string $name, string $user_id, $thumb = null): bool
    {
        return $this->makeSimpleRequest('setStickerSetThumb', [
            'name' => $name,
            'user_id' => $user_id,
        ], ['thumb' => $thumb]);
    }
}