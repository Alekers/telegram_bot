# CHANGE LOG
## 2.0.0 - Upcoming
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
* Actualize entities:
    * `ChatMember`
* Add exceptions at case:
    * token is wrong
    * data is incorrect (Bad Request)
* Add ability to configure entities from package in constructor
* Add class `ChatAction` for all available action contants
* Add method `getLinkForFileDownload`, that simply returned link for download