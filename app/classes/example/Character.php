<?php

namespace App\Classes\Example;

/**
 * 攻撃できるやつ
 */
class Character extends Breakable implements IAttack
{
    protected int $power = 10;

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
        return rand(floor($this->power * 0.9), ceil($this->power * 1.1));
    }
}
