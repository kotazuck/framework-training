<?php


namespace App\Controller;

use OreOre\Core\View;
use OreOre\Core\Response;

class AppController extends \OreOre\Core\Controller
{
    protected function response($mainView)
    {
        $template = new View("template");
        $header = new View("header");
        $footer = new View("footer");

        $template->set("header", $header->render());
        $template->set("main", $mainView->render());
        $template->set("footer", $footer->render());

        return new Response(200, $template->render(), []);
    }
}
