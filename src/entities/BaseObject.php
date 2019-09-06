<?php
/**
 * Created date 5/5/2018 8:09 PM
 * @author Tsvetkov Alexander <ac@goldcarrot.ru>
 */

namespace tsvetkov\telegram_bot\entities;

abstract class BaseObject
{
    /**
     * Special array for converting standart json objects to object of needed class.
     * Keys of array os property names, values is class name for 'new' command.
     * All properties listed in this array sets as 'safe' in rules
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
     * @return BaseObject|BaseObject[]|null
     */
    protected function createObjectsFromData($data, $class)
    {
        if (!is_null($data) && !empty($data)) {
            if (is_string($class)) {
                $result = new $class();
                $result->load($data);
                return $result;
            } elseif (is_array($class)) {
                $result = [];
                foreach ($data as $key => $value) {
                    $result[$key] = $this->createObjectsFromData($value, $class[0]);
                }
                return $result;
            }
        }
        return null;
    }

    /**
     * @param array $data
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