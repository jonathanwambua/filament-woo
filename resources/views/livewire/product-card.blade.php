<div class="card bg-white m-3 rounded">
    <img src="{{ $product->images[0]->src }}" alt="{{ $product->name }}" class="w-full h-50 object-cover">
    <div class="p-4">
        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
        <h5 class="text-lg font-normal text-gray-400"> $ {{ $product->price }}</h5>
        <h5 class="text-lg font-normal"> Visibility: {{ $visible ? 'visible' : 'hidden' }}</h5>
        <div class="my-1">
            

            <label class="inline-flex items-center cursor-pointer">
                <input type="checkbox" class="sr-only peer" wire:model="visible" wire:change="updateStatus">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
            </label>
        </div>
        
        <input type="text" wire:model="price" wire:blur="updatePrice" class="p-2 border rounded">
    </div>
</div>