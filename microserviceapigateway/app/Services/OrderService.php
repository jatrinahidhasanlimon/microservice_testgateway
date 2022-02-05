<?php

declare(strict_types = 1);

namespace App\Services;

use App\Traits\RequestService;

use function config;
use Illuminate\Http\Request;
class OrderService
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

    public function __construct()
    {
        // dd(config('services.orders.secret'));
        $this->baseUri = config('services.orders.base_uri');
        $this->secret = config('services.orders.secret');
    }
    public function customFetch(Request $request) : string
    {
        $path = $request->getPathInfo();
        return $this->request($request->method(), $path);
    }

   
}
