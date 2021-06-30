<?php

namespace OreOre\Core;

class Controller
{
    /**
     * Request
     *
     * @var Request
     */
    protected $request;

    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * エンドポイント
     *
     * @return Response
     */
    public function index()
    {
        return new Response(404, "Not Found", []);
    }
}
