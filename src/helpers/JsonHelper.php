<?php
/**
 * Created date 4/30/2018 9:16 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\helpers;

use function is_array;
use function is_null;
use function is_object;

class JsonHelper
{
    /**
     * @param $value
     * @param int $options
     *
     * @return string|null
     */
    public static function encodeWithoutEmptyProperty($value, $options = 320)
    {
        if (is_null($value)) {
            return null;
        }
        $value = self::unsetEmptyProperties($value);
        return json_encode($value, $options);
    }

    /**
     * @param $value
     * @return mixed
     */
    private static function unsetEmptyProperties($value)
    {
        $newArray = [];
        foreach ($value as $key => $item) {
            if (is_array($item) || is_object($item)) {
                $item = self::unsetEmptyProperties($item);
            }
            if (!is_null($item)) {
                $newArray[$key] = $item;
            }
        }
        return $newArray;
    }
}