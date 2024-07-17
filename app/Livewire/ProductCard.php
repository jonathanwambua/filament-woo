<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\WooCommerceService;
use Exception;
use Illuminate\Support\Facades\Log;

class ProductCard extends Component
{
    public $product;
    public $status;
    public $price;
    public $visible;

    public function mount($product)
    {
        $this->product = $product;
        $this->status = $product['stock_status'];
        $this->price = $product['regular_price'];
        $this->visible = $product['stock_status'] === 'instock';
    }

    public function updateStatus(WooCommerceService $wooCommerceService)
    {
        $qty = $this->status === 'instock' ? 0 : 99;
        try {
            $wooCommerceService->updateProduct($this->product['id'], ['stock_quantity' => $qty]);
        } catch (Exception $e) {
            Log::error('Update Status: ', ['error' => $e]);
        }
    }

    public function updatePrice(WooCommerceService $wooCommerceService)
    {
        $wooCommerceService->updateProduct($this->product['id'], ['regular_price' => $this->price]);
    }

    public function render()
    {
        return view('livewire.product-card');
    }
}
