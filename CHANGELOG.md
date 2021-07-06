# CHANGE LOG

## 3.0.0 - TBA

* `!IMPORTANT` A minimum requirement for `PHP` is now 7.4
* Compatibility with Bot API 5.0
* New methods:
    * `unpinAllChatMessages`
* New entities:
    * `ChatLocation`
    * `ProximityAlertTriggered`
    * `ChatMemberOwner`
    * `ChatMemberAdministrator`
    * `ChatMemberMember`
    * `ChatMemberRestricted`
    * `ChatMemberLeft`
    * `ChatMemberBanned`
* Edited entities:
    * `WebhookInfo` now have `ip_address` property
    * `Chat` now have `linked_chat_id` and `location` properties
    * `Audio` now have `file_name` property
    * `Video` now have `file_name` property
    * `InputMediaDocument` now have `disable_content_type_detection` property
    * `Location` now have `horizontal_accuracy`, `live_period`, `heading` and `proximity_alert_radius` properties
    * `InlineQueryResultLocation` now have `horizontal_accuracy`, `heading` and `proximity_alert_radius` properties
    * `InputLocationMessageContent` now have `horizontal_accuracy`, `heading` and `proximity_alert_radius` properties
    * `Message` now have `proximity_alert_triggered`, `sender_chat` and `` properties // TODO
    * `ChatMember` is now abstract, use children instead
* Edited methods:
    * `setWebhook`
        * add new params: `ip_address` and `drop_pending_updates`Location
        * params order `changed!`
    * `deleteWebhook` add new param: `drop_pending_updates`
    * `unbanChatMember` add new param: `only_if_banned`
    * `sendDocument`
        * add new params: `caption_entities`, `disable_content_type_detection` and `allow_sending_without_reply`
        * params order `changed!`
    * `unpinChatMessage` add new param: `message_id`
    * `sendLocation`
        * add new params: `horizontal_accuracy`, `heading`, `proximity_alert_radius` and `allow_sending_without_reply`
        * params order `changed!`
    * `editMessageLiveLocation`
        * add new params: `horizontal_accuracy`, `heading` and `proximity_alert_radius`
        * params order `changed!`
    
## 2.6.1 - 2020/12/03
* Compatibility with Guzzle ^7
## 2.6.0 - 2020/06/05
* Compatibility with Bot API 4.9
* Edited entities:
    * `Message` now  have `via_bot` property
    * `InlineQueryResultGif` and `InlineQueryResultMpeg4Gif` now  have `thumb_mime_type` property
* Add `DiceType` class for constant help
## 2.5.1 - 2020/04/30
* Add `ParseMode` class for constant help
## 2.5.0 - 2020/04/24
* Compatibility with Bot API 4.8
* Edited entities:
    * `Poll` now have `explanation`, `explanation_entities`, `open_period` and `close_date`
    * `Dice` now have `emoji`
* Edited methods: 
    * `sendPoll` add new params: `explanation`, `explanation_parse_mode`, `open_period` and `close_date`
    * `sendDice` add new param: `emoji`
## 2.4.0 - 2020/04/13
* Compatibility with Bot API 4.7
* New entities:
    * `Dice`
    * `BotCommand`
* Edited entities:
    * `Message` now has property `dice`
    * `StickerSet` now has property `thumb`
* New methods:
    * `sendDice`
    * `getMyCommands`
    * `setMyCommands`
    * `setStickerSetThumb`
* Edited methods:
    * `createNewStickerSet` and `addStickerToSet` now has parameter `tgs_sticker`
## 2.3.0 - 2020/02/08
* Compatibility with Bot API 4.6
* Edited entities: 
    * `Audio` now has property `thumb`
    * `Animation` now has properties `width`, `height` and `duration`
    * `Contact` now has property `vcard`
    * `Venue` now has property `foursquare_type`
    * Move type constants from `MessageEntity` to `MessageEntityType`
    * Add types constants for `MessageEntityType`: `underline`, `strikethrough`, `cashtag`, `phone_number`
    * Add `file_unique_id` property for: `Animation`, `Audio`, `Document`, `PassportFile`, `PhotoSize`, `Sticker`, `Video`, `VideoNote`, `Voice` and `File`
    * Add `small_file_unique_id` and `big_file_unique_id` properties for `ChatPhoto`
    * Add `custom_title` property for `ChatMember`
    * Add `slow_mode_delay` property for `Chat`
    * Add `request_poll` property for `KeyboardButton`
    * Add `poll_answer` property for `Update`
    * Add `language` property for `MessageEntity`
    * Add new properties to `Poll`: `total_voter_count`, `is_anonymous`, `type`, `allows_multiple_answers` and `correct_option_id`
    * Add new properties to `User`: `can_join_groups`, `can_read_all_group_messages` and `supports_inline_queries`
    * Move status constants from `ChatMember` to `ChatMemberStatus`
* New entities:
    * `ResponseParameters`
    * `KeyboardButtonPollType`
    * `PollAnswer`
* Edited methods:
    * `createNewStickerSet`
    * `sendSticker`
    * `addStickerToSet`
    * `sendPoll` <b>WARNING</b>, param's order was changed
* New methods: 
    * `setChatAdministratorCustomTitle`
## 2.2.0 - 2019/09/06
* Currently all inner objects <b>WILL NOT</b> be loaded as empty, it will be `null`
* New entities:
    * `InputMessageContent`and all him children
    * `InlineQueryResult` and all him children
* Edited entities: 
    * All constants and field `all_members_are_administrators` from `Chat`
    * Removed `Game` alias class
* New methods - `answerInlineQuery`
## 2.1.2 - 2019/08/18
* Entities:
    * New:
        * `InlineQuery`
        * `ChosenInlineResult`
    * Changed:
        * `Update` now have `inline_query`, `chosen_inline_result`, `shipping_query`, `pre_checkout_query` and `poll` fields
## 2.1.1 - 2019/08/17
* Entities:
    * New:
        * `ChatPermissions`
        * `PassportData`
        * `PassportFile`
        * `EncryptedPassportElement`
        * `EncryptedCredentials`
        * `PassportElementError`
        * `PassportElementErrorDataField`
        * `PassportElementErrorFrontSide`
        * `PassportElementErrorReverseSide`
        * `PassportElementErrorSelfie`
        * `PassportElementErrorFile`
        * `PassportElementErrorFiles`
        * `PassportElementErrorTranslationFile`
        * `PassportElementErrorTranslationFiles`
        * `PassportElementErrorUnspecified`
        * `LoginUrl`
        * `GameHighScore`
    * Changed:
        * `Sticker` and `StickerSet` now have `is_animated` field
        * `Chat` now have `permissions` field
        * `ChatMember` now have `can_send_polls` field
        * `Message` now have `forward_sender_name`, `animation`, `passport_data`, `reply_markup` fields + fixes for not loaded objects
        * `InlineKeyboardButton` now have `login_url` field
* Methods:
    * New:
        * `setChatPermissions`
        * `setPassportDataErrors`
        * `sendGame`
        * `setGameScore`
        * `getGameHighScores`
    * Changed:
        * `restrictChatMember` now get as argument `ChatPermissions`, except set of bool fields
## 2.1.0 - 2019/08/10
* Method changed:
    * `sendSticker` return `Message|null`
    * `getStickerSet` return `StickerSet|null`
    * `uploadStickerFile` return `File|null`
    * `createNewStickerSet`, `sendSticker` and `addStickerToSet` attribute list currently updated with official Telegram API
    * `getStickerSet`, `uploadStickerFile` and `deleteStickerFromSet` now able to throws exceptions
    * `setStickerPositionInSet` was added
## 2.0.0 - 2019/06/27
* Change structure for bot constructor, ability to change all request options
* Realize methods:
    * `getMe` 
    * `forwardMessage`
    * `sendAudio`
    * `sendVideo`
    * `sendAnimation`
    * `sendVoice`
    * `sendVideoNote`
    * `sendMediaGroup`
    * `sendLocation`
    * `editMessageLiveLocation`
    * `stopMessageLiveLocation`
    * `sendVenue`
    * `sendContact`
    * `sendPoll`
    * `sendChatAction`
    * `getUserProfilePhotos`
    * `getFile`
    * `kickChatMember`
    * `unbanChatMember`
    * `restrictChatMember`
    * `promoteChatMember`
    * `exportChatInviteLink`
    * `setChatPhoto`
    * `deleteChatPhoto`
    * `setChatTitle`
    * `setChatDescription`
    * `pinChatMessage`
    * `unpinChatMessage`
    * `leaveChat`
    * `getChat`
    * `getChatAdministrators`
    * `getChatMembersCount`
    * `getChatMember`
    * `setChatStickerSet`
    * `deleteChatStickerSet`
    * `answerCallbackQuery`
    * `editMessageText`
    * `editMessageCaption`
    * `editMessageMedia`
    * `editMessageReplyMarkup`
    * `stopPoll`
    * `deleteMessage`
    * `sendInvoice`
    * `answerShippingQuery`
    * `answerPreCheckoutQuery`
* Method changed:
    * `sendMessage` return `Message|null`
    * `sendPhoto` return `Message|null`
    * `sendDocument` return `Message|null`
    * `getWebhookInfo` return `WebhookInfo|null`
    * `getUpdates` allow parameters, return `Update[]|null`
* Add entities:
    * `InputMediaPhoto`
    * `InputMediaVideo`
    * `InputMediaAnimation`
    * `InputMediaAudio`
    * `InputMediaDocument`
    * `UserProfilePhotos`
    * `Poll`
    * `PollOption`
    * `LabeledPrice`
    * `ShippingOption`
    * `ShippingQuery`
    * `PreCheckoutQuery`
* Actualize entities:
    * `ChatMember`
* Add exceptions at case:
    * token is wrong
    * data is incorrect (Bad Request)
* Add ability to configure entities from package in constructor
* Add class `ChatAction` for all available action contants
* Add method `getLinkForFileDownload`, that simply returned link for download