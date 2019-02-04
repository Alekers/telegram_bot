<?php
/**
 * Created date 5/5/2018 10:21 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot;


use GuzzleHttp\Client;
use tsvetkov\telegram_bot\entities\sticker\StickerSet;
use tsvetkov\telegram_bot\helpers\JsonHelper;

class TelegramBot
{
    /** @var string */
    protected $token;

    /** @var string */
    protected $baseUrl;

    /** @var array */
    protected $requestOptions;

    /**
     * TelegramBot constructor.
     * @param $token
     *
     * Format for proxyConfig "protocol://user:password@IP:port"
     * @param string $proxyConfig
     * @param null $ipResolve
     */
    public function __construct($token, $proxyConfig = null, $ipResolve = null)
    {
        $this->token = $token;
        $this->baseUrl = "https://api.telegram.org/bot{$this->token}";
        $this->requestOptions = [];
        if ($proxyConfig !== null) {
            $this->requestOptions['proxy'] = $proxyConfig;
        }
        if ($ipResolve !== null) {
            $this->requestOptions['curl'] = [
                CURLOPT_IPRESOLVE => $ipResolve
            ];
        }
    }

    /**
     * @param integer|string $chat_id
     * @param string $text
     * @param string $parse_mode
     * @param bool $disable_web_page_preview
     * @param bool $disable_notification
     * @param integer $reply_to_message_id
     * @param $reply_markup
     * @return bool
     */
    public function sendMessage($chat_id, $text, $parse_mode = null, $reply_markup = null, $disable_web_page_preview = null, $disable_notification = null, $reply_to_message_id = null)
    {
        if (!in_array(strtolower($parse_mode), ['markdown', 'html', null])) {
            throw new \InvalidArgumentException('Invalid parse_mode argument');
        }
        $data = [
            'chat_id' => $chat_id,
            'text' => $text,
            'parse_mode' => $parse_mode,
            'disable_web_page_preview' => $disable_web_page_preview,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ];
        return $this->makeRequest($this->baseUrl . '/sendMessage', $data);
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $files
     * @param bool $returnContent
     * @return bool|string
     */
    protected function makeRequest($url, $data = null, $files = null, $returnContent = false)
    {
        try {
            $client = new Client();
            $decodedData = [];
            $options = [];
            if ($data) {
                foreach ($data as $key => $item) {
                    if (is_object($item) || is_array($item)) {
                        $contents = JsonHelper::encodeWithoutEmptyProperty($item);
                    } else {
                        $contents = $item;
                    }
                    $decodedData[] = [
                        'name' => $key,
                        'contents' => $contents,
                    ];
                }
            }
            if ($files) {
                foreach ($files as $name => $file) {
                    if (is_file($file)) {
                        $contents = fopen($file, 'r');
                    } else {
                        $contents = $file;
                    }
                    $decodedData[] = [
                        'name' => $name,
                        'contents' => $contents,
                    ];
                }
            }
            if (!empty($decodedData)) {
                $options['multipart'] = $decodedData;
            }
            foreach ($this->requestOptions as $key => $value) {
                $options[$key] = $value;
            }
            $decodedResponse = json_decode($client->post($url, $options)->getBody()->getContents());

            if ($returnContent) {
                return $decodedResponse;
            }
            return (bool)$decodedResponse->ok;
        } catch (\Exception $exception) {
            if ($returnContent) {
                return '';
            }
            return false;
        }
    }

    /**
     * @param integer|string $chat_id
     * @param string $photo Path to file
     * @param null $caption
     * @param string $parse_mode
     * @param bool $disable_notification
     * @param integer $reply_to_message_id
     * @param $reply_markup
     * @return bool
     */
    public function sendPhoto($chat_id, $photo, $caption = null, $parse_mode = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        if (!in_array(strtolower($parse_mode), ['markdown', 'html', null])) {
            throw new \InvalidArgumentException('Invalid parse_mode argument');
        }
        $data = [
            'chat_id' => $chat_id,
            'caption' => $caption,
            'parse_mode' => $parse_mode,
            'disable_notification' => $disable_notification,
            'reply_to_message_id' => $reply_to_message_id,
            'reply_markup' => $reply_markup,
        ];
        return $this->makeRequest($this->baseUrl . '/sendPhoto', $data, ['photo' => $photo]);
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
     * @return bool
     */
    public function sendDocument($chat_id, $document, $thumb = null, $caption = null, $parse_mode = null, $disable_notification = null, $reply_to_message_id = null, $reply_markup = null)
    {
        if (!in_array(strtolower($parse_mode), ['markdown', 'html', null])) {
            throw new \InvalidArgumentException('Invalid parse_mode argument');
        }
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
        return $this->makeRequest($this->baseUrl . '/sendDocument', $data, $files);
    }

    /**
     * @param $url
     * @param null $certificate
     * @param int $max_connections
     * @param null $allowed_updates
     * @return bool
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
     * @return string
     */
    public function getWebhookInfo()
    {
        return $this->makeRequest($this->baseUrl . '/getWebhookInfo', null, null, true);
    }

    /**
     * @return string
     */
    public function getUpdates()
    {
        return $this->makeRequest($this->baseUrl . '/getUpdates', null, null, true);
    }

    /**
     * @param string|int $chat_id
     * @param string $urlFileName
     * @return bool|string
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
            ], null, true))->ok;
        } catch (\Exception $exception) {}
        return false;
    }

    /**
     * @param $user_id
     * @param $png_sticker
     * @return bool
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
            return json_decode($result)->result->file_id;
        } catch (\Exception $exception) {}
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
            $stickerSet->load($answer->result);
            return $stickerSet;
        } catch (\Exception $exception) {}
        return false;
    }

    /**
     * @return bool|string
     */
    public function deleteWebhook()
    {
        return $this->makeRequest($this->baseUrl . '/deleteWebhook');
    }
}