# CHANGE LOG
## 2.0.0 - Upcoming
* Change structure for bot constructor, available to change all request options
* Realize methods:
    * `getMe` 
    * `forwardMessage`
    * `sendAudio`
    * `sendVideo`
    * `sendAnimation`
    * `sendVoice`
    * `sendVideoNote`
* Add exceptions at case:
    * token is wrong
    * data is incorrect (Bad Request)
* `sendMessage`, `sendPhoto`, `sendDocument`  will return object of Message or null, in error cases
* `getWebhookInfo` will return `WebhookInfo` object or null, in error cases
* `getUpdates` realized with params, will return `Update[]` or `null` on error