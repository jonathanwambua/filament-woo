<?php

namespace App\Models;

use App\Services\WooCommerceService;
use Illuminate\Database\Eloquent\Model;
use Sushi\Sushi;

class Product extends Model
{
    use Sushi;

    public function getRows()
    {
        $wooService = new WooCommerceService();
        return $wooService->getProducts();
    }
}
