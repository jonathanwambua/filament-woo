<?php

namespace App\Services;

use Codexshaper\WooCommerce\Facades\Product;
use Codexshaper\WooCommerce\Facades\WooCommerce;

class WooCommerceService
{
    public function getProducts()
    {
        return WooCommerce::all('products');
    }

    public function updateProduct($id, $data)
    {
        return Product::update($id, $data);
    }
}
