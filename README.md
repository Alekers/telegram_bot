<p align="center">
    <h1 align="center">Telegram Bot by Tsvetkov</h1>
</p>



[![Latest Stable Version](https://img.shields.io/packagist/v/tsvetkov/telegram_bot.svg)](https://packagist.org/packages/tsvetkov/telegram_bot)
[![Total Downloads](https://img.shields.io/packagist/dt/tsvetkov/telegram_bot.svg)](https://packagist.org/packages/tsvetkov/telegram_bot)

Installation
------------
In order to install extension use Composer. Either run

```
php composer.phar require tsvetkov/telegram_bot
```

or add

```
"tsvetkov/telegram_bot": "*"
```

to the require section of your composer.json.

Basic Usage
-----------

Initialization

```
use tsvetkov\telegram_bot\TelegramBot;

$bot = new TelegramBot($token); // You can get token of you bots from @BotFather

// With proxy
$requestOptions = [
    'proxy' => 'your_proxy_config',
];
$bot = new TelegramBot($token, $requestOptions);
```

Send message

```
$bot->sendMessage($userId, 'Hello world!');
```

Get updates

```
$updates = $bot->getUpdates();
```

Webhooks

```
$data = json_decode(file_get_contents('php://input'));

$update = new \tsvetkov\telegram_bot\entities\update\Update($data);
```

How to send media group with a files?
-----------

Use `attach://file_name_in_post` for that
```
$media = [
    new \tsvetkov\telegram_bot\entities\inputMedia\InputMediaPhoto([
        'media' => 'attach://file-photo',
    ]),
    new \tsvetkov\telegram_bot\entities\inputMedia\InputMediaVideo([
        'media' => 'attach://file-video',
    ]),
];
```
Don't forget to add your files to request
```
$files = [
    'file-video' => "path_to_video_for_upload",
    'file-photo' => "path_to_photo_for_upload",
];
```
And just send your request
```
$message = $bot->sendMediaGroup($chatId, $media, $files);
```