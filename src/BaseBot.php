<?php
/**
 * Created date 4/29/2019 11:31 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Throwable;
use tsvetkov\telegram_bot\exceptions\BadRequestException;
use tsvetkov\telegram_bot\exceptions\ForbiddenException;
use tsvetkov\telegram_bot\exceptions\InvalidTokenException;
use function fopen;
use function is_array;
use function is_file;
use function is_object;
use function json_decode;

abstract class BaseBot
{
    protected string $token;

    protected string $baseUrl;

    protected array $requestOptions;

    /**
     * TelegramBot constructor.
     *
     * @param string $token
     * @param array $requestOptions
     */
    public function __construct(string $token, array $requestOptions = [])
    {
        $this->token = $token;
        $this->baseUrl = "https://api.telegram.org/bot{$this->token}/";
        $this->requestOptions = $requestOptions;
    }

    /**
     * @param array $data
     * @param array $files
     *
     * @return array
     */
    protected function getOptionsForRequest($data = [], $files = []): array
    {
        $options = $this->requestOptions;
        $decodedData = [];

        foreach ($data as $key => $item) {
            $this->addField($decodedData, $key, $item);
        }

        foreach ($files as $name => $file) {
            $this->addField($decodedData, $name, $file, true);
        }

        if (!empty($decodedData)) {
            $options['multipart'] = $decodedData;
        }

        return $options;
    }

    /**
     * @param RequestException $exception
     *
     * @return bool
     *
     * @throws BadRequestException
     * @throws InvalidTokenException
     * @throws ForbiddenException
     */
    protected function processException(RequestException $exception): bool
    {
        switch ($exception->getCode()) {
            case 400:
                $response = $exception->getResponse();
                if (!is_null($response)) {
                    $data = json_decode($response->getBody()->getContents(), true);
                    throw new BadRequestException($data['description']);
                }
                throw new BadRequestException();
            case 401:
                throw new InvalidTokenException($this->token);
            case 403:
                $response = $exception->getResponse();
                if (!is_null($response)) {
                    $data = json_decode($response->getBody()->getContents(), true);
                    throw new ForbiddenException($data['description'], $data['error_code']);
                }
                throw new ForbiddenException();
        }
        return false;
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $files
     *
     * @return array
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    protected function makeRequest(string $url, array $data = [], array $files = []): array
    {
        $url = $this->baseUrl . $url;
        try {
            $client = new Client();

            $options = $this->getOptionsForRequest($data, $files);

            return json_decode($client->post($url, $options)->getBody()->getContents(), true);
        } catch (RequestException $clientException) {
            $this->processException($clientException);
        } catch (Throwable $throwable) {
            // TODO?
        }
        return [];
    }

    /**
     * @param string $url
     * @param array $data
     * @param array $files
     *
     * @return bool
     *
     * @throws InvalidTokenException
     * @throws BadRequestException
     * @throws ForbiddenException
     */
    protected function makeSimpleRequest(string $url, array $data = [], array $files = []): bool
    {
        $url = $this->baseUrl . $url;
        try {
            $client = new Client();

            $options = $this->getOptionsForRequest($data, $files);

            $decodedResponse = json_decode($client->post($url, $options)->getBody()->getContents(), true);

            return $decodedResponse['result'];
        } catch (RequestException $e) {
            $this->processException($e);
        } catch (Throwable $throwable) {
            // TODO?
        }
        return false;
    }

    /**
     * @param array $data
     * @param string $name
     * @param mixed $contents
     * @param bool $checkOnFile
     */
    protected function addField(array &$data, string $name, $contents, $checkOnFile = false)
    {
        if (is_null($contents)) {
            return;
        }
        if (is_array($contents) || is_object($contents)) {
            foreach ($contents as $childName => $content) {
                $this->addField($data, "{$name}[{$childName}]", $content, $checkOnFile);
            }
        } else {
            if ($checkOnFile && is_file($contents)) {
                $contents = fopen($contents, 'r');
            }
            $data[] = [
                'name' => $name,
                'contents' => $contents,
            ];
        }
    }

    /**
     * Simple method for getting download link to file
     *
     * @param string $file_path
     * @return string
     */
    public function getLinkForFileDownload(string $file_path): string
    {
        return "https://api.telegram.org/file/bot{$this->token}/{$file_path}";
    }
}