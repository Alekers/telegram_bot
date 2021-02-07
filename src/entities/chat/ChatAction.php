<?php
/**
 * Created date 5/25/2019 5:43 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities\chat;

/**
 * Class ChatAction
 * @package tsvetkov\telegram_bot\entities\chat
 */
abstract class ChatAction
{
    public const TYPING = 'typing';
    public const UPLOAD_PHOTO = 'upload_photo';
    public const RECORD_VIDEO = 'record_video';
    public const UPLOAD_VIDEO = 'upload_video';
    public const RECORD_AUDIO = 'record_audio';
    public const UPLOAD_AUDIO = 'upload_audio';
    public const UPLOAD_DOCUMENT = 'upload_document';
    public const FIND_LOCATION = 'find_location';
    public const RECORD_VIDEO_NOTE = 'record_video_note';
    public const UPLOAD_VIDEO_NOTE = 'upload_video_note';
}