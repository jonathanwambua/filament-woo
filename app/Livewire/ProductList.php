<?php

namespace App\Livewire;

use App\Models\Product;
use App\Services\WooCommerceService;
use Livewire\Component;

class ProductList extends Component
{
    public $products;

    public function mount(WooCommerceService $wooCommerceService)
    {
        $this->products = Product::all()->toArray();
    }

    public function render()
    {
        return view('livewire.product-list');
    }
}
