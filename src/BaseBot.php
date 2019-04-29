<?php
/**
 * Created date 4/29/2019 11:31 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot;


use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use tsvetkov\telegram_bot\exceptions\BadRequestException;
use tsvetkov\telegram_bot\exceptions\InvalidTokenException;
use tsvetkov\telegram_bot\helpers\JsonHelper;
use function fopen;
use function is_array;
use function is_file;
use function is_object;
use function json_decode;

abstract class BaseBot
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
     * Use this for any request settings, for example - proxy
     * $requestOptions = [
     *      'proxy' => 'your_config'
     * ];
     * @param array $requestOptions
     */
    public function __construct($token, $requestOptions = [])
    {
        $this->token = $token;
        $this->baseUrl = "https://api.telegram.org/bot{$this->token}";
        $this->requestOptions = $requestOptions;
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $files
     * @param bool $returnContent
     *
     * @return bool|array
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
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

            foreach ($this->requestOptions as $key => $value) {
                $options[$key] = $value;
            }

            if (!empty($decodedData)) {
                $options['multipart'] = $decodedData;
            }

            $decodedResponse = json_decode($client->post($url, $options)->getBody()->getContents(), true);
            if ($returnContent) {
                return $decodedResponse;
            }
            return $decodedResponse['ok'];
        } catch (ClientException $clientException) {
            switch ($clientException->getCode()) {
                case 400:
                    $data = json_decode($clientException->getResponse()->getBody()->getContents(), true);
                    throw new BadRequestException($data['description']);
                case 401:
                    throw new InvalidTokenException($this->token);
            }
            if ($returnContent) {
                return [];
            }
            return false;
        } catch (Exception $exception) {
            if ($returnContent) {
                return [];
            }
            return false;
        }
    }
}