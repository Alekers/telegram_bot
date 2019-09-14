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
    protected $objectsArray = [];

    /**
     * BaseObject constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        if (!empty($data)) {
            $this->load($data);
        }
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function load($data)
    {
        $loaded = $this->simpleLoad((array)$data);
        if (!$loaded) {
            return false;
        }
        foreach ((array)$this->objectsArray as $attribute => $class) {
            $this->$attribute = $this->createObjectsFromData($this->$attribute, $class);
        }
        return true;
    }

    /**
     * @param array $data
     * @param array|string $class
     *
     * @return null|object|object[]
     */
    protected function createObjectsFromData($data, $class)
    {
        if (!is_null($data) && !empty($data)) {
            if (is_string($class)) {
                $result = new $class();
                if (method_exists($result, 'load')) {
                    $result->load($data);
                }
                return $result;
            } elseif (is_array($class)) {
                $results = [];
                foreach ($data as $key => $value) {
                    $result = new $class[0]();
                    if (method_exists($result, 'load')) {
                        $result->load($data);
                    }
                    $results[$key] = $result;
                }
                return $results;
            }
        }
        return null;
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    protected function simpleLoad($data)
    {
        if (is_array($data) && !empty($data) ) {
            foreach ($data as $name => $value) {
                if (property_exists($this, $name)) {
                    $this->$name = $value;
                }
            }
            return true;
        }
        return false;
    }
}