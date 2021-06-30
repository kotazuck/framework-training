<?php

namespace App\Classes\Example;

/**
 * 攻撃を受けるインターフェース
 */
interface IDamage
{
    public function damage(IAttack $attack);
}
