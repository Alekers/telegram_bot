<?php
/**
 * Created date 4/30/2018 9:16 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\helpers;

use function is_array;
use function is_null;
use function is_object;

/**
 * Class JsonHelper
 * @package tsvetkov\telegram_bot\helpers
 */
class JsonHelper
{
    /**
     * @param mixed $value
     * @param int $options
     *
     * @return string|null
     */
    public static function encodeWithoutEmptyProperty($value, int $options = 320): ?string
    {
        if (is_null($value)) {
            return null;
        }
        $value = self::unsetEmptyProperties($value);
        return json_encode($value, $options);
    }

    /**
     * @param mixed $value
     *
     * @return array
     */
    private static function unsetEmptyProperties($value): array
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