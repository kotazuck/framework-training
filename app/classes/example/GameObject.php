<?php

namespace App\Classes\Example;

class GameObject
{
    protected string $name = "";

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
