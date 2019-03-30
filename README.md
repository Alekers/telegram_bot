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
$bot = new TelegramBot($token, $proxySettings);
```

Send message

```
$bot->sendMessage($userId, 'Hello world!');
```

Get updates

```
$updates = $bot->getUpdates();
```

Get WebHook data

```
$update = new Update();
$update->load(json_decode(file_get_contents("php://input")));
```
