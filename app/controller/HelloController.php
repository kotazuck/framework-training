<?php

namespace App\Controller;

use OreOre\Core\Response;

class HelloController extends \OreOre\Core\Controller
{
    public function index()
    {
        return new Response(200, "World", []);
    }
}
