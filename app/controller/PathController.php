<?php

namespace App\Controller;

use OreOre\Core\View;

class PathController extends AppController
{
    public function index()
    {
        $main = new View($this->request->paths[0]);
        $main->set("message", "this is my homepageだよ");
        return $this->response($main);
    }
}
