<div x-data class="px-8">
    <p class="text-gray-500 font-bold mb-4">
        <span class="text-lg">Stock disponible:</span>
        {{$quantity}}
    </p>

    <div class="flex">
        <div class="mr-4">
            <x-jet-secondary-button
                disabled
                x-bind:disabled="$wire.qty <= 1"
                wire:loading.attr="disabled"
                wire:target="decrement"
                wire:click="decrement">
                -
            </x-jet-secondary-button>
            
                <span class="mx-2 text-gray-700">{{$qty}}</span>
            
            <x-jet-secondary-button
                x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled"
                wire:target="increment"
                wire:click="increment">
                
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <x-button color="blue" 
                class="w-full"
                x-bind:disabled="$wire.qty > $wire.quantity"
                wire:click="addItem"
                wire:loading.attr="disabled"
                wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>
</div>
