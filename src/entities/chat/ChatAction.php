<?php
/**
 * Created date 5/25/2019 5:43 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\chat;


abstract class ChatAction
{
    const TYPING = 'typing';
    const UPLOAD_PHOTO = 'upload_photo';
    const RECORD_VIDEO = 'record_video';
    const UPLOAD_VIDEO = 'upload_video';
    const RECORD_AUDIO = 'record_audio';
    const UPLOAD_AUDIO = 'upload_audio';
    const UPLOAD_DOCUMENT = 'upload_document';
    const FIND_LOCATION = 'find_location';
    const RECORD_VIDEO_NOTE = 'record_video_note';
    const UPLOAD_VIDEO_NOTE = 'upload_video_note';
}