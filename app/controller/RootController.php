<?php

namespace App\Controller;

use App\Classes\Example\Breakable;
use App\Classes\Example\Enemy;
use App\Classes\Example\Player;
use App\Classes\Example\Spell;

class RootController extends \OreOre\Core\Controller
{
    public function index()
    {
        header('Content-Type: text/plain;');
        // $this->hello();

        $player = new Player("社会人");
        $player->setHp(100);
        $player->setPower(20);

        $enemy = new Enemy("クモ");
        $enemy->setHp(30);
        $enemy->setPower(20);

        $spell = new Spell("社会のしがらみ");
        $spell->setPower(50000000);

        $wall = new Breakable("壁");
        $wall->setHp(10);

        echo sprintf("%s HP: %d\n", $player->getName(), $player->getHp());
        echo sprintf("%s HP: %d\n", $enemy->getName(), $enemy->getHp());
        echo "\n";

        $enemy->damage($player);
        echo sprintf("%s が %s に攻撃\n", $player->getName(), $enemy->getName());

        echo "\n";
        echo sprintf("%s HP: %d\n", $player->getName(), $player->getHp());
        echo sprintf("%s HP: %d\n", $enemy->getName(), $enemy->getHp());
        echo "\n";

        $player->damage($enemy);
        echo sprintf("%s が %s に攻撃\n", $enemy->getName(), $player->getName());

        echo "\n";
        echo sprintf("%s HP: %d\n", $player->getName(), $player->getHp());
        echo sprintf("%s HP: %d\n", $enemy->getName(), $enemy->getHp());
        echo "\n";

        $wall->damage($player);
        echo sprintf("%s が %s を殴った\n", $player->getName(), $wall->getName());
        echo sprintf("%s HP: %d\n", $wall->getName(), $wall->getHp());
        echo "\n";

        $player->damage($spell);
        echo sprintf("%s が %s をくらった\n", $player->getName(), $spell->getName());
        echo sprintf("%s HP: %d\n", $player->getName(), $player->getHp());
    }

    public function hello()
    {
        echo "Hello World";
    }
}
