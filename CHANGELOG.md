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
* Add entities:
    * `InputMediaPhoto`
    * `InputMediaVideo`
* Add exceptions at case:
    * token is wrong
    * data is incorrect (Bad Request)
* `sendMessage`, `sendPhoto`, `sendDocument` returns object of Message or null, in error cases
* `getWebhookInfo` returns `WebhookInfo` object or null, in error cases
* `getUpdates` realized with params, returns `Update[]` or `null` on error
* Add ability to configurate entities from package in constructor