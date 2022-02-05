<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\OrderService;
use App\Services\NodeProductService;
use Illuminate\Http\Request;

class GateWayController extends Controller
{

    private $productService;
    protected $orderService;
    private $nodeProductService;
    /**
     * ProductController constructor.
     *
     * @param \App\Services\ProductService $productService
     */
    public function __construct(ProductService $productService, OrderService $orderService, NodeProductService $nodeProductService)
    {
        $this->productService = $productService;
        $this->orderService = $orderService;
        $this->nodeProductService = $nodeProductService;
    }
     public function index(Request $request)
    { 
        $base_url = url();
        $url = array();
        $url = explode($base_url,$request->url());
        $path = $request->getPathInfo();
        if (strpos($path, '/api/node') !== false) {
            // dd('node api');
            return $this->successResponse($this->nodeProductService->Fetch($request));
        }
        else if (strpos($path, '/api/product') !== false)
        {
            // dd('product api');
            return $this->successResponse($this->productService->customFetch($request));

        }
        else if (strpos($path, '/api/order') !== false)
        {
            // dd('order api');
            return $this->successResponse($this->orderService->customFetch($request));

        }
        else 
        {
            
            return response()->json(
            [
                'message' => 'Related Service Not Found',   
            ],400
            );
        }
       
    }
     public function index_back(Request $request)
    {
        // dd($request->method());
        // dd($request->server);
        // dd(route());
        // dd($request->getPathInfo());
        // dd( $request->route());
        // dd($request->uri());
        // dd($request->url());
        // dd(url());
        $base_url = url().'/api/';
        // dd($base_url);
        $url = array();
        // $href = str_split('8000/api/',$request->url());
        $url = explode($base_url,$request->url());
        // dd($url);
        $path = $request->getPathInfo();
        // $path = "hey /node/";
        dd($base_url);
        dd($path);
        if (strpos($path, '/node/') !== false) {
        //    return 'matched';
        // dd($this->nodeProductService);
        return $this->successResponse($this->nodeProductService->Fetch($request));
        }
        else
        {
            // return 'not matched';
            return $this->successResponse($this->productService->customFetch($request));

        }
        
        // dd('',$request->url());
        // dd('product controller index api gateway');
        return $this->successResponse($this->productService->customFetch($request));
    }

   
}
