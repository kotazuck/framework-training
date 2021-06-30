<?php

define("CORE_DIR", __DIR__);
define("ROOT_DIR", dirname(__DIR__));
define("APP_DIR", ROOT_DIR . '/app');
define("APP_CONFIG_DIR", APP_DIR . '/config');
define("APP_VIEW_DIR", APP_DIR . '/view');

require(CORE_DIR . '/function.php');

require(CORE_DIR . '/Request.php');
require(CORE_DIR . '/Controller.php');
require(CORE_DIR . '/Config.php');
require(CORE_DIR . '/View.php');
require(CORE_DIR . '/Response.php');
require(CORE_DIR . '/RuntimeException.php');

spl_autoload_register(function ($cls) {
    $path = str_replace('\\', '/', $cls);
    $dir = strtolower(dirname($path));
    $name = basename($path);
    $file = ROOT_DIR . '/' . $dir . '/' . $name . '.php';
    if (is_file($file)) {
        include_once $file;
    }
});

$request = new OreOre\Core\Request();

$config = OreOre\Core\Config::load('routes');

if ($config === null) {
    http_response_code(500);
    exit(1);
}

$paths = $config->keys();

usort(
    $paths,
    function ($a, $b) {
        return strlen($a) > strlen($b) ? -1 : (strlen($a) < strlen($b) ? 1 : 0);
    }
);

/**
 * @var \OreOre\Core\Response|null
 */
$response = null;

foreach ($paths as $path) {
    if (strpos($request->path, $path) === 0) {
        if ($path === '/' && $request->path !== '/') {
            continue;
        }
        // route.php内の連想配列のキーが$path
        $cls = $config->get($path);

        /**
         * @var \OreOre\Core\Controller
         */
        $controller = new $cls($request);

        try {
            $response = $controller->index();
        } catch (\OreOre\Core\RuntimeException $e) {
            continue;
        }
        break;
    }
}

if ($response) {
    $response->send();
}

$response = new \OreOre\Core\Response(404, "Not Found", []);
$response->send();
