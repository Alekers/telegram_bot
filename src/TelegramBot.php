<?php
/**
 * Created date 5/5/2018 10:21 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot;

use Exception;
use tsvetkov\telegram_bot\entities\keyboard\InlineKeyboardMarkup;
use tsvetkov\telegram_bot\entities\keyboard\ReplyKeyboardMarkup;
use tsvetkov\telegram_bot\entities\keyboard\ReplyKeyboardRemove;
use tsvetkov\telegram_bot\entities\message\File;
use tsvetkov\telegram_bot\entities\message\ForceReply;
use tsvetkov\telegram_bot\entities\message\Message;
use tsvetkov\telegram_bot\entities\sticker\StickerSet;
use tsvetkov\telegram_bot\entities\update\Update;
use tsvetkov\telegram_bot\entities\user\User;
use tsvetkov\telegram_bot\entities\user\UserProfilePhotos;
use tsvetkov\telegram_bot\entities\webhook\WebhookInfo;
use tsvetkov\telegram_bot\exceptions\BadRequestException;
use tsvetkov\telegram_bot\exceptions\InvalidTokenException;
use function is_null;
use function json_decode;
use tsvetkov\telegram_bot\helpers\JsonHelper;

class TelegramBot extends BaseBot
{
    /**
     * Official docs: https://core.telegram.org/bots/api#getme
     *
     * @return User
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function getMe()
    {
        $data = $this->makeRequest($this->baseUrl . '/getMe', null, null, true);
        $bot = new User();
        $bot->load($data['result']);
        return $bot;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#sendmessage
     *
     * @param integer|string $chat_id
     * @param string $text
     * @param string $parse_mode
     * @param bool $disable_web_page_preview
     * @param bool $disable_notification
     * @param integer $reply_to_message_id
     * @param $reply_markup
     *
     * @return Message|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function sendMessage(
        $chat_id, $text, $parse_mode = null, $reply_markup = null, $disable_web_page_preview = null,
        $disable_notification = null, $reply_to_message_id = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ];
        $returnData = $this->makeRequest($this->baseUrl . '/sendMessage', $data, [], true);
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
     * @param bool $disable_notification
     *
     * @return Message|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification = false)
    {
        $data = $this->makeRequest($this->baseUrl . '/forwardMessage', [
            'chat_id' => $chat_id,
            'from_chat_id' => $from_chat_id,
            'message_id' => $message_id,
            'disable_notification' => $disable_notification,
        ], [], true);
        if ($data['ok']) {
            return new Message($data['result']);
        }
        return null;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#sendphoto
     *
     * @param integer|string $chat_id
     * @param string $photo Path to file
     * @param null $caption
     * @param string $parse_mode
     * @param bool $disable_notification
     * @param integer $reply_to_message_id
     * @param $reply_markup
     *
     * @return Message|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function sendPhoto(
        $chat_id, $photo, $caption = null, $parse_mode = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ];
        $returnData = $this->makeRequest($this->baseUrl . '/sendPhoto', $data, ['photo' => $photo], true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#sendaudio
     * Max size audio is 50 MB
     *
     * @param $chat_id
     * @param $audio
     * @param null $caption
     * @param null $parse_mode
     * @param null $duration
     * @param null $performer
     * @param null $title
     * @param null $thumb
     * @param bool $disable_notification
     * @param null $reply_to_message_id
     * @param null $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendAudio(
        $chat_id, $audio, $caption = null, $parse_mode = null, $duration = null, $performer = null,
        $title = null, $thumb = null, $disable_notification = false, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
            'duration' => $duration,
            'performer' => $performer,
            'title' => $title,
        ];
        $files['audio'] = $audio;
        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }
        $returnData = $this->makeRequest($this->baseUrl . '/sendAudio', $data, $files, true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official docs: https://core.telegram.org/bots/api#senddocument
     * Max size document is 50 MB
     * @param integer|string $chat_id
     * @param string $document Path to file
     * @param string $thumb Path to file
     * @param null $caption
     * @param string $parse_mode
     * @param bool $disable_notification
     * @param integer $reply_to_message_id
     * @param $reply_markup
     *
     * @return Message|null
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function sendDocument(
        $chat_id, $document, $thumb = null, $caption = null, $parse_mode = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ];
        $files['document'] = $document;
        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }
        $returnData = $this->makeRequest($this->baseUrl . '/sendDocument', $data, $files, true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#setwebhook
     *
     * @param string $url
     * @param null $certificate
     * @param int $max_connections
     * @param string[] $allowed_updates
     *
     * @return bool
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function setWebhook($url, $max_connections = null, $certificate = null, $allowed_updates = null)
    {
        $data = [
            'url' => $url,
            'max_connections' => $max_connections,
            'available_updates' => $allowed_updates,
        ];
        $files = null;
        if ($certificate) {
            $files['certificate'] = $certificate;
        }
        return $this->makeRequest($this->baseUrl . '/setWebhook', $data, $files);
    }

    /**
     * @return WebhookInfo|null
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function getWebhookInfo()
    {
        $data = $this->makeRequest($this->baseUrl . '/getWebhookInfo', null, null, true);
        if ($data['ok']) {
            return new WebhookInfo($data['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#getupdates
     *
     * @param int $offset
     * @param int $limit
     * @param int $timeout
     * @param string[] $allowed_updates
     *
     * @return Update[]|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function getUpdates($limit = null, $offset = null, $timeout = null, $allowed_updates = null)
    {
        $data = $this->makeRequest($this->baseUrl . '/getUpdates', [
            'offset' => $offset,
            'limit' => $limit,
            'timeout' => $timeout,
            'allowed_updates' => $allowed_updates,
        ], null, true);
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
     * @param string|int $chat_id
     * @param string $urlFileName
     * @return bool|string
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function sendSticker($chat_id, $urlFileName)
    {
        return $this->makeRequest($this->baseUrl . '/sendSticker', [
            'chat_id' => $chat_id,
            'sticker' => $urlFileName,
        ], null, true);
    }

    /**
     * @param $user_id
     * @param $name
     * @param $title
     * @param $png_sticker
     * @param $emojis
     * @return bool|string
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function createNewStickerSet($user_id, $name, $title, $png_sticker, $emojis)
    {
        return $this->makeRequest($this->baseUrl . '/createNewStickerSet', [
            'user_id' => $user_id,
            'name' => $name,
            'title' => $title,
            'emojis' => $emojis,
            'png_sticker' => $png_sticker,
        ]);
    }

    /**
     * Telegram id for owner of file
     * @param int $user_id
     *
     * Sticker set name
     * @param string $name
     *
     * File id at telegram server
     * @param string $png_sticker
     *
     * Associative emoji for sticker
     * @param string $emojis
     *
     * @return bool
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function addStickerToSet($user_id, $name, $png_sticker, $emojis)
    {
        return $this->makeRequest($this->baseUrl . '/addStickerToSet', [
            'user_id' => $user_id,
            'name' => $name,
            'emojis' => $emojis,
            'png_sticker' => $png_sticker,
        ]);
    }

    /**
     * @param $sticker
     * @return bool
     */
    public function deleteStickerFromSet($sticker)
    {
        try {
            return json_decode($this->makeRequest($this->baseUrl . '/deleteStickerFromSet', [
                'sticker' => $sticker,
            ], null, true))['ok'];
        } catch (Exception $exception) {
        }
        return false;
    }

    /**
     * @param $user_id
     * @param $png_sticker
     * @return bool
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function uploadStickerFile($user_id, $png_sticker)
    {
        $result = $this->makeRequest(
            $this->baseUrl . '/uploadStickerFile',
            ['user_id' => $user_id],
            ['png_sticker' => $png_sticker],
            true
        );
        try {
            return $result['result']['file_id'];
        } catch (Exception $exception) {
        }
        return false;
    }

    /**
     * @param $name
     * @return bool|StickerSet
     */
    public function getStickerSet($name)
    {
        try {
            $answer = json_decode($this->makeRequest($this->baseUrl . '/getStickerSet', [
                'name' => $name,
            ], null, true));
            $stickerSet = new StickerSet();
            $stickerSet->load($answer['result']);
            return $stickerSet;
        } catch (Exception $exception) {
        }
        return false;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#deletewebhook
     *
     * @return bool
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     */
    public function deleteWebhook()
    {
        return $this->makeRequest($this->baseUrl . '/deleteWebhook');
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendvideo
     *
     * @param int|string $chat_id
     * @param $video
     * @param int $duration
     * @param int $width
     * @param int $height
     * @param $thumb
     * @param string $caption
     * @param string $parse_mode
     * @param bool $supports_streaming
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendVideo(
        $chat_id, $video, $duration = null, $width = null, $height = null,
        $thumb = null, $caption = null, $parse_mode = null, $supports_streaming = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
            'supports_streaming' => $supports_streaming,
        ];
        $files['video'] = $video;
        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }

        $returnData = $this->makeRequest($this->baseUrl . '/sendVideo', $data, $files, true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendanimation
     *
     * @param string|int $chat_id
     * @param $animation
     * @param int $duration
     * @param int $width
     * @param int $height
     * @param $thumb
     * @param string $caption
     * @param string $parse_mode
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendAnimation(
        $chat_id, $animation, $duration = null, $width = null, $height = null, $thumb = null, $caption = null,
        $parse_mode = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
            'duration' => $duration,
            'width' => $width,
            'height' => $height,
        ];
        $files['animation'] = $animation;
        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }

        $returnData = $this->makeRequest($this->baseUrl . '/sendAnimation', $data, $files, true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendvoice
     *
     * @param string|int $chat_id
     * @param $voice
     * @param string $caption
     * @param string $parse_mode
     * @param int $duration
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendVoice(
        $chat_id, $voice, $caption = null, $parse_mode = null, $duration = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
            'duration' => $duration,
        ];
        $files['voice'] = $voice;

        $returnData = $this->makeRequest($this->baseUrl . '/sendVoice', $data, $files, true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * Official Docs: https://core.telegram.org/bots/api#sendvideonote
     *
     * @param string|int $chat_id
     * @param $video_note
     * @param int $duration
     * @param int $length
     * @param $thumb
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendVideoNote(
        $chat_id, $video_note, $duration = null, $length = null, $thumb = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
            'duration' => $duration,
            'length' => $length,
        ];
        $files['video_note'] = $video_note;
        if (!is_null($thumb)) {
            $files['thumb'] = $thumb;
        }

        $returnData = $this->makeRequest($this->baseUrl . '/sendVideoNote', $data, $files, true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendmediagroup
     *
     * @param int $chat_id
     * @param array $media array of InputMediaPhoto or InputMediaVideo
     * @param array $files
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendMediaGroup($chat_id, $media, $files = [], $disable_notification = null, $reply_to_message_id = null)
    {
        $data = [
            'chat_id' => $chat_id,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'media' => JsonHelper::encodeWithoutEmptyProperty($media),
        ];

        $returnData = $this->makeRequest($this->baseUrl . '/sendMediaGroup', $data, $files, true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendlocation
     *
     * @param int|string $chat_id
     * @param float $latitude
     * @param float $longitude
     * @param int $live_period
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendLocation(
        $chat_id, $latitude, $longitude, $live_period = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'live_period' => $live_period,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ];

        $returnData = $this->makeRequest($this->baseUrl . '/sendLocation', $data, [], true);
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
     * @param int|string $chat_id
     * @param integer $message_id
     * @param string $inline_message_id
     * @param InlineKeyboardMarkup $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function editMessageLiveLocation(
        $latitude, $longitude, $chat_id = null, $message_id = null, $inline_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'inline_message_id' => $inline_message_id,
            'reply_markup' => $reply_markup,
        ];

        $returnData = $this->makeRequest($this->baseUrl . '/editMessageLiveLocation', $data, [], true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#stopmessagelivelocation
     *
     * @param int|string $chat_id
     * @param integer $message_id
     * @param string $inline_message_id
     * @param InlineKeyboardMarkup $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function stopMessageLiveLocation($chat_id = null, $message_id = null, $inline_message_id = null, $reply_markup = null)
    {
        $data = [
            'chat_id' => $chat_id,
            'message_id' => $message_id,
            'inline_message_id' => $inline_message_id,
            'reply_markup' => $reply_markup,
        ];

        $returnData = $this->makeRequest($this->baseUrl . '/stopMessageLiveLocation', $data, [], true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
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
     * @param string $foursquare_id
     * @param string $foursquare_type
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendVenue(
        $chat_id, $latitude, $longitude, $title, $address, $foursquare_id = null, $foursquare_type = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
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
            'reply_markup' => $reply_markup,
        ];

        $returnData = $this->makeRequest($this->baseUrl . '/sendVenue', $data, [], true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendcontact
     *
     * @param string|int $chat_id
     * @param string $phone_number
     * @param string $first_name
     * @param string $last_name
     * @param string $vcard
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendContact(
        $chat_id, $phone_number, $first_name, $last_name = null, $vcard = null,
        $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'phone_number' => $phone_number,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'vcard' => $vcard,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ];

        $returnData = $this->makeRequest($this->baseUrl . '/sendContact', $data, [], true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendpoll
     *
     * @param string|int $chat_id
     * @param string $question
     * @param string[] $options
     * @param bool $disable_notification
     * @param int $reply_to_message_id
     * @param InlineKeyboardMarkup|ReplyKeyboardMarkup|ReplyKeyboardRemove|ForceReply $reply_markup
     *
     * @return Message|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendPoll(
        $chat_id, $question, $options, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null
    )
    {
        $data = [
            'chat_id' => $chat_id,
            'question' => $question,
            'options' => JsonHelper::encodeWithoutEmptyProperty($options),
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ];

        $returnData = $this->makeRequest($this->baseUrl . '/sendPoll', $data, [], true);
        if ($returnData['ok']) {
            return new Message($returnData['result']);
        }
        return null;
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#sendchataction
     *
     * @param int|string $chat_id
     * @param string $action
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function sendChatAction($chat_id, $action)
    {
        return $this->makeRequest($this->baseUrl . '/sendChatAction', [
            'chat_id' => $chat_id,
            'action' => $action,
        ]);
    }

    /**
     * OfficialDocs: https://core.telegram.org/bots/api#getuserprofilephotos
     *
     * @param int $user_id
     * @param int $offset
     * @param int $limit
     *
     * @return UserProfilePhotos|null
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     */
    public function getUserProfilePhotos($user_id, $offset = null, $limit = null)
    {
        $returnData = $this->makeRequest($this->baseUrl . '/getUserProfilePhotos', [
            'user_id' => $user_id,
            'offset' => $offset,
            'limit' => $limit,
        ], [], true);
        if ($returnData['ok']) {
            $userProfilePhotos = new UserProfilePhotos();
            $userProfilePhotos->load($returnData['result']);
            return $userProfilePhotos;
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
     */
    public function getFile($file_id)
    {
        $returnData = $this->makeRequest($this->baseUrl . '/getFile', ['file_id' => $file_id], [], true);
        if ($returnData['ok']) {
            $file = new File();
            $file->load($returnData['result']);
            return $file;
        }
        return null;
    }

    /**
     * Simple method for getting download link to file
     *
     * @param string $file_path
     * @return string
     */
    public function getLinkForFileDownload($file_path)
    {
        return "https://api.telegram.org/file/bot{$this->token}/{$file_path}";
    }
}