<?php
/**
 * Created date 5/5/2018 8:09 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities;

/**
 * Class BaseObject
 * @package tsvetkov\telegram_bot\entities
 */
abstract class BaseObject
{
    /**
     * Special array for converting standard json objects to object of needed class.
     * Keys of array is property name, values is class name for 'new' statement.
     * For array of special object set array with class name as first element
     * Example:
     *
     * $objectsArray = [
     *   'message' => Message::class
     *   'from' => User::class
     *   'stickers' => [Stickers::class]
     * ];
     *
     * @var array
     */
    protected array $objectsArray = [];

    /**
     * BaseObject constructor.
     * @param array $data
     */
    public function __construct(array $data = [])
    {
        foreach ($data as $name => $value) {
            if (property_exists($this, $name)) {
                if (key_exists($name, $this->objectsArray)) {
                    if (is_array($this->objectsArray[$name])) {
                        $result = [];
                        foreach ($value as $valueItem) {
                            $result[] = new $this->objectsArray[$name][0]($valueItem);
                        }
                        $this->$name = $result;
                    } else {
                        $this->$name = new $this->objectsArray[$name]($value);
                    }
                } else {
                    $this->$name = $value;
                }
            }
        }
    }
}