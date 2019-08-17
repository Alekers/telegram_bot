# CHANGE LOG
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