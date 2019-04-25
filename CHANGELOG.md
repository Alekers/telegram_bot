# CHANGE LOG
## 2.0.0 - Upcoming
* Realize methods:
    * `getMe` 
    * `forwardMessage`
    * `sendAudio`
* Add exception at case:
    * when token is wrong
    * when data is incorrect (Bad Request)
* Currently all inner json_encode's use only associative arrays
* `sendMessage`, `sendPhoto`, `sendDocument`  will return object of Message or null, in error cases