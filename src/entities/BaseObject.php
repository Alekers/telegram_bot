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
            if (is_string($class)) {
                $json = $this->$attribute;
                $this->$attribute = new $class();
                $this->$attribute->load($json);
            } elseif (is_array($class)) {
                foreach ($this->$attribute as $key => $value) {
                    $json = $this->$attribute[$key];
                    $this->$attribute[$key] = new $class[0]();
                    $this->$attribute[$key]->load($json);
                }
            }

        }
        return true;
    }

    /**
     * @param array $data
     * @return bool
     */
    protected function simpleLoad($data)
    {
        if (!empty($data)) {
            if (is_array($data)) {
                foreach ($data as $name => $value) {
                    if (property_exists($this, $name)) {
                        $this->$name = $value;
                    }
                }
            }
            return true;
        }
        return false;
    }
}