<?php

namespace App\Services;

use Codexshaper\WooCommerce\Facades\Product;
use Codexshaper\WooCommerce\Facades\WooCommerce;

class WooCommerceService
{
    public function getProducts()
    {
        $products = WooCommerce::all('products');

        $response = array();
        foreach ($products as $product) {

            $productArr['id'] = $product->id;
            $productArr['name'] = $product->name;
            $productArr['stock_status'] = $product->stock_status;
            $productArr['regular_price'] = $product->regular_price;
            $productArr['image'] = $product->images[0]->src;


            $response[] = $productArr;
        }

        return $response;
    }

    public function updateProduct($id, $data)
    {
        return Product::update($id, $data);
    }

    public function convertObjectsToArray($data) {
        if (is_object($data)) {
            $data = (array) $data;
        }
        
        if (is_array($data)) {
            foreach ($data as &$value) {
                $value = $this->convertObjectsToArray($value);
            }
        }
        
        return $data;
    }
}
