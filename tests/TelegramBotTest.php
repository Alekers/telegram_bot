<?php

use PHPUnit\Framework\TestCase;
use tsvetkov\telegram_bot\entities\user\User;
use tsvetkov\telegram_bot\TelegramBot;

/**
 * Class TelegramBotTest
 */
class TelegramBotTest extends TestCase
{
    private static array $config;
    private static TelegramBot $bot;

    public static function setUpBeforeClass(): void
    {
        self::$config = json_decode(file_get_contents(__DIR__ . '/fixtures-local.json'), true);
        self::$bot = new TelegramBot(self::$config['token']);
    }

    /**
     * @covers \tsvetkov\telegram_bot\TelegramBot::getMe
     */
    public function testGetMe()
    {
        $expected = new User(self::$config['methods']['getMe']);
        $this->assertEquals($expected, self::$bot->getMe());
    }

    /**
     * @covers \tsvetkov\telegram_bot\TelegramBot::sendMessage
     */
    public function testSendMessage()
    {
        $messageText = "Hello world!";
        $message = self::$bot->sendMessage(self::$config['authorId'], $messageText);
        $this->assertNotNull($message);
        $this->assertEquals($messageText, $message->text);
    }

    /**
     * @covers \tsvetkov\telegram_bot\TelegramBot::forwardMessage
     */
    public function testForwardMessage()
    {
        $firstMessage = self::$bot->sendMessage(self::$config['authorId'], "First message");
        $this->assertNotNull($firstMessage);
        $secondMessage = self::$bot->forwardMessage(
            $firstMessage->chat->id,
            $firstMessage->chat->id,
            $firstMessage->message_id
        );
        $this->assertNotNull($secondMessage);
        $this->assertNotNull($secondMessage->forward_date);
        $this->assertNotNull($secondMessage->forward_from);
    }

    /**
     * @covers \tsvetkov\telegram_bot\TelegramBot::sendPhoto
     */
    public function testSendPhoto()
    {
        $asUrl = self::$bot->sendPhoto(self::$config['authorId'], self::$config['attachments']['photo']['url']);
        $this->assertNotNull($asUrl);
        $this->assertNotEmpty($asUrl->photo);

        $asPostFile = self::$bot->sendPhoto(
            self::$config['authorId'],
            __DIR__ . '/attachments/' . self::$config['attachments']['photo']['localPath']
        );
        $this->assertNotNull($asPostFile);
        $this->assertNotEmpty($asPostFile->photo);

        $asTelegramId = self::$bot->sendPhoto(self::$config['authorId'], $asUrl->photo[0]->file_id);
        $this->assertNotNull($asTelegramId);
        $this->assertNotEmpty($asTelegramId->photo);
    }

    /**
     * @covers \tsvetkov\telegram_bot\TelegramBot::sendAudio
     */
    public function testSendAudio()
    {
        $asUrl = self::$bot->sendAudio(self::$config['authorId'], self::$config['attachments']['audio']['url']);
        $this->assertNotNull($asUrl);
        $this->assertNotEmpty($asUrl->audio);

        $asPostFile = self::$bot->sendAudio(
            self::$config['authorId'],
            __DIR__ . '/attachments/' . self::$config['attachments']['audio']['localPath']
        );
        $this->assertNotNull($asPostFile);
        $this->assertNotEmpty($asPostFile->audio);

        $asTelegramId = self::$bot->sendAudio(self::$config['authorId'], $asUrl->audio->file_id);
        $this->assertNotNull($asTelegramId);
        $this->assertNotEmpty($asTelegramId->audio);
    }

    /**
     * @covers \tsvetkov\telegram_bot\TelegramBot::sendDocument
     */
    public function testSendDocument()
    {
        $asUrl = self::$bot->sendDocument(self::$config['authorId'], self::$config['attachments']['document']['url']);
        $this->assertNotNull($asUrl);
        $this->assertNotEmpty($asUrl->document);

        $asPostFile = self::$bot->sendDocument(
            self::$config['authorId'],
            __DIR__ . '/attachments/' . self::$config['attachments']['document']['localPath']
        );
        $this->assertNotNull($asPostFile);
        $this->assertNotEmpty($asPostFile->document);

        $asTelegramId = self::$bot->sendDocument(self::$config['authorId'], $asUrl->document->file_id);
        $this->assertNotNull($asTelegramId);
        $this->assertNotEmpty($asTelegramId->document);
    }
}
