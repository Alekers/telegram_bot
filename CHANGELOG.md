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
* Add entities:
    * `InputMediaPhoto`
    * `InputMediaVideo`
    * `InputMediaAnimation`
    * `InputMediaAudio`
    * `InputMediaDocument`
    * `UserProfilePhotos`
* Actualize entities:
    * `ChatMember`
* Add exceptions at case:
    * token is wrong
    * data is incorrect (Bad Request)
* `sendMessage`, `sendPhoto`, `sendDocument` returns object of Message or null, in error cases
* `getWebhookInfo` returns `WebhookInfo` object or null, in error cases
* `getUpdates` realized with params, returns `Update[]` or `null` on error
* Add ability to configurate entities from package in constructor
* Add class `ChatAction` for all available action contants
* Add method `getLinkForFileDownload`, that simply returned link for download