<?php

namespace OreOre\Core;

class Request
{
    public $uri = "";
    public $path = "";
    public $paths = [];
    public $querystring = "";
    public $header = [];
    public $body = "";

    protected $_get = [];
    protected $_post = [];
    protected $_json = [];

    public function __construct()
    {
        $this->uri = server('REQUEST_URI');

        $tmp = explode("?", $this->uri);

        $this->path = $tmp[0];
        $this->paths = array_filter(
            explode("/", trim($this->path, " \t\n\r\0\x0B/")),
            function ($e) {
                return !!$e;
            }
        );

        if (count($tmp) > 1) {
            $this->querystring = $tmp[1];
        }

        parse_str($this->querystring, $this->_get);

        $this->header = getallheaders();
        $this->body = file_get_contents("php://input");

        $ct = array_get($this->header, "Content-Type");

        if ($ct === "application/json") {
            $this->_json = json_decode($this->body, true);
        } else if ($ct === "application/x-www-form-urlencoded") {
            parse_str($this->body, $this->_post);
        }
    }

    public function get($key, $default = null)
    {
        return array_get($this->_get, $key, $default);
    }

    public function post($key, $default = null)
    {
        return array_get($this->_post, $key, $default);
    }

    public function json($key, $default = null)
    {
        return array_get($this->_json, $key, $default);
    }
}
