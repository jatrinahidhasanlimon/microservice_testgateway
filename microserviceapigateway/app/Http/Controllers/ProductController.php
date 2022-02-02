<?php

declare(strict_types = 1);

namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Services\NodeProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productService;

    /**
     * ProductController constructor.
     *
     * @param \App\Services\ProductService $productService
     */
    public function __construct(ProductService $productService,NodeProductService $nodeProductService)
    {
        $this->productService = $productService;
        $this->nodeProductService = $nodeProductService;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        // dd('product controller index api gateway');
        return $this->successResponse($this->productService->fetchProducts());
    } 
     public function new_index(Request $request)
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
        // dd($path);
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

    /**
     * @param $product
     *
     * @return mixed
     */
    public function show($product)
    {
        return $this->successResponse($this->productService->fetchProduct($product));
    }

    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return mixed
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->productService->createProduct($request->all()));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param                          $product
     *
     * @return mixed
     */
    public function update(Request $request, $product)
    {
        return $this->successResponse($this->productService->updateProduct($product, $request->all()));
    }

    /**
     * @param $product
     *
     * @return mixed
     */
    public function destroy($product)
    {
        return $this->successResponse($this->productService->deleteProduct($product));
    }
}
