<div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    @foreach ($products as $product)
        <livewire:product-card :product="$product" :key="$product['id']"/>
    @endforeach
</div>