<?php

namespace App\Classes\Example;

/**
 * 破壊可能オブジェクト
 */
class Breakable extends GameObject implements IDamage
{
    protected int $hp = 0;

    public function damage(IAttack $attacker)
    {
        $this->hp -= $attacker->attack();
    }

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp)
    {
        $this->hp = $hp;
    }
}
