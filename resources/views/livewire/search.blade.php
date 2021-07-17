<div class="flex-1 relative" x-data>

    <form action="{{route('search')}}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" type="text" class="w-full" placeholder="¿Estas buscando algun producto?" />
        <button class="absolute top-0 right-0 w-12 h-full bg-gray-300 flex items-center justify-center rounded-r-md">
            <x-search size="35" color="blue" />
        </button>
    </form>
   

    <div class="absolute w-full mt-1 hidden" 
        :class="{ 'hidden' : !$wire.open }"
        x-on:click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="py-3 px-4">
                @forelse ($products as $product)
                    <a href="{{route('products.show', $product)}}" class="flex">
                        <img class="w-16 h-12 object-cover py-1" src="{{ Storage::url($product->images->first()->url) }}" alt="">
                        <div class="flex-1 ml-4 text-gray-700">
                            <p class="text-lg font-semibold leading-5">{{$product->name}}</p>
                            <p class="text-lg font-semibold text-green-600">USD {{$product->price}}</p>
                        </div>
                    </a>
                @empty
                    <p class="text-lg font-semibold">
                        No existe ningún registro con los parametros especificados
                    </p>
                @endforelse
            </div>
        </div>
    </div>

</div>
