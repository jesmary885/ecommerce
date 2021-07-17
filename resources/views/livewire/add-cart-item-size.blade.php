<div x-data>

    <div class="px-8 flex items-center">
        <p class="text-xl text-gray-500 mr-5">Talla:</p>

        <select wire:model="size_id" class="form-control w-full text-gray-500 text-lg">
            <option value="" selected disabled>Seleccionar una talla</option>

            @foreach ($sizes as $size)
                <option value="{{$size->id}}">{{$size->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="px-8 py-4 flex items-center">
        <p class="text-xl text-gray-500 mr-4">Color:</p>

        <select wire:model="color_id" class="form-control w-full text-gray-500 text-lg">
            <option value="" selected disabled>Seleccionar un color</option>

            @foreach ($colors as $color)
                <option value="{{$color->id}}">{{ __($color->name) }}</option>
            @endforeach
        </select>
    </div>

    <p class="text-gray-500 font-bold m-8 ">
        <span class="text-lg">Stock disponible:</span>
        @if ($quantity)
            {{$quantity}}
        @else
            {{$product->stock}}
        @endif 
    </p>

    <div class="flex p-8">
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
            <x-button 
                color="blue" 
                class="w-full"
                x-bind:disabled="!$wire.quantity"
                wire:click="addItem"
                wire:loading.attr="disabled"
                wire:target="addItem">
                Agregar al carrito de compras
            </x-button>
        </div>
    </div>

</div>