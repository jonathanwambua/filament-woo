<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
use App\Services\WooCommerceService;

class SyncWooCommerceProducts extends Command
{
    protected $signature = 'sync:woocommerce-products';
    protected $description = 'Sync WooCommerce products to Sushi model';

    protected $wooCommerceService;

    public function __construct(WooCommerceService $wooCommerceService)
    {
        parent::__construct();
        $this->wooCommerceService = $wooCommerceService;
    }

    public function handle()
    {
        $products = $this->wooCommerceService->getProducts();
        Product::truncate();
        foreach ($products as $product) {
            Product::create([
                'id' => $product->id,
                'name' => $product->name,
                'status' => $product->stock_status,
                'regular_price' => $product->regular_price,
                'image' => $product->images[0]->src,
            ]);
        }
    }
}
