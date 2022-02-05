<?php

declare(strict_types = 1);

namespace App\Services;

use App\Traits\RequestService;

use function config;
use Illuminate\Http\Request;
class ProductService
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
        $this->baseUri = config('services.products.base_uri');
        $this->secret = config('services.products.secret');
    }

    /**
     * @return string
     */
    public function customFetch(Request $request) : string
    {
        $path = $request->getPathInfo();
        return $this->request($request->method(), $path);
    }
    public function fetchProducts() : string
    {
        return $this->request('GET', '/api/product');
    }

   
}
