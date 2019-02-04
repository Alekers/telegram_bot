<?php

/**
 * Created date 2/4/2019 2:09 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

require 'vendor/autoload.php';


$id = 390950327;
$bot = new tsvetkov\telegram_bot\TelegramBot('657606031:AAE_p4RNhu3WCRmBvOYmLSpR0zHzMUS2s48', 'socks5://sockduser:gbplfhek.233@46.101.123.25:1080', CURL_IPRESOLVE_V4);
//var_dump($bot->sendMessage($id, 'Hello'));
//die;
//$bot->sendDocument($id, 'https://api.blackroll.me/uploads/234dc29ec194022cb3e4dd9a9c5a1880.png', null, 'This is a roll');
$bot->sendDocument($id, __DIR__ . '\1.png', null, 'This is a roll');