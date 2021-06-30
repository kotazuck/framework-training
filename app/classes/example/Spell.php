<?php

namespace App\Classes\Example;

class Spell extends GameObject implements IAttack
{
    protected int $power = 0;

    public function getPower()
    {
        return $this->power;
    }

    public function setPower(int $power)
    {
        $this->power = $power;
    }

    public function attack(): int
    {
        return $this->power;
    }
}
