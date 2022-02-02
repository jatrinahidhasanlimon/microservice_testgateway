<?php

declare(strict_types = 1);

namespace App\Services;

use App\Traits\RequestService;

use function config;
use Illuminate\Http\Request;
class NodeProductService
{
    use RequestService;

    /**
     * @var string
     */
    protected $baseUri;

    /**
     * @var string
     */
    protected $secret;

    /**
     * ProductService constructor.
     */
    public function __construct()
    {
        // dd('here');
        // dd(config('services.products.base_uri'));
        $this->baseUri = config('services.node_products.base_uri');
        $this->secret = config('services.node_products.secret');
    }

    /**
     * @return string
     */
    public function Fetch(Request $request) : string
    {
        // dd('node product service');
        $path = '/api'.$request->getPathInfo();
        return $this->request($request->method(), $path);
    }
   
}
