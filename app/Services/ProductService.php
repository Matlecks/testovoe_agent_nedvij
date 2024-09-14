<?php

namespace App\Services;

use App\Models\Product;

use GuzzleHttp\Client;

use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Log;

class ProductService
{

    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://usermanagementservice.ru/api/',
        ]);
    }

    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductForEdit($id)
    {
        $product = Product::find($id);

        return ['product' => $product];
    }

    public function updateProduct($id, array $validatedData)
    {
        $product = Product::find($id);
        $product->update($validatedData);
    }

    public function storeProduct(array $validatedData)
    {
        return Product::create($validatedData);
    }

    public function destroyProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

}
