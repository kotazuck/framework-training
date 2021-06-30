<?php

namespace OreOre\Core;

class Config
{
    /**
     * ```php
     * $configs = [
     *     $name => Config
     * ];
     * ```
     * 
     * の
     */
    static array $configs = [];

    /**
     *
     *
     * @param string $name
     * @return Config|null
     */
    public static function load($name)
    {
        if (isset(static::$configs[$name])) {
            return static::$configs[$name];
        }

        if (is_file(APP_CONFIG_DIR . '/' . $name . '.php')) {
            $arr = include(APP_CONFIG_DIR . '/' . $name . '.php');
            static::$configs[$name] = new Config($arr);
            return static::$configs[$name];
        }

        return null;
    }

    protected $arr = [];

    protected function __construct($arr)
    {
        $this->arr = $arr;
    }

    public function get($key, $default = null)
    {
        return array_get($this->arr, $key, $default);
    }

    public function keys()
    {
        return array_keys($this->arr);
    }
}
