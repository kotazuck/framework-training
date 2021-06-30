<?php

namespace OreOre\Core;

class View
{
    protected $file = "";
    protected $path = "";

    protected $data = [];

    public function __construct($file)
    {
        $this->file = $file;
        $this->path = APP_VIEW_DIR . '/' . $file . '.php';
        if (!is_file($this->path)) {
            throw new RuntimeException("ViewNotFoundException: " . $this->path);
        }
    }

    public function set($key, $value)
    {
        $this->data[$key] = $value;
        return $this;
    }

    public function render()
    {
        extract($this->data);

        $str = "";
        ob_start();
        include $this->path;
        $str = ob_get_clean();

        return $str;
    }
}
