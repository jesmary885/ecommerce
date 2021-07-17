<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <x-cart />
                    @if (Cart::count())
                        {{--Icono del carrito con items--}}
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{Cart::count()}}</span>  
                    @else
                        {{--Icono del carrito sin item solo con el circulito--}}
                        <span class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>   
                    @endif
            </span>
        </x-slot>

        <x-slot name="content">
            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex p-2 border-b border-gray-200">
                        <img class="h-15 w-20 object-cover mr-4" src="{{$item->options->image}}" alt="">
                        <article class="flex-1 text-gray-700">
                            <h1 class="font-bold">{{$item->name}}</h1>
                            <div class="flex">
                                <p>Cant: {{$item->qty}}</p>
                                @isset($item->options['color'])
                                    <p class="mx-2">Color: {{__($item->options['color'])}}</p>
                                @endisset
                                @isset($item->options['size'])
                                <p class="mx-2">Talla: {{$item->options['size']}}</p>
                            @endisset
                            </div>
                            <p>USD {{$item->price}}</p>
                        </article>
                    </li>
                @empty
                <li class="py-2 px-0">
                    <p class="text-center text-gray-700">
                        No tiene ningun producto en su carrito
                    </p>
                </li>
            @endforelse

            </ul>

            @if (Cart::count())
                <div class="p-2">
                    <p class="font-bold text-blue-500 mt-2 mb-3">Total: USD {{Cart::subtotal()}}</p>
                    <x-button-enlace color="blue" class="w-full">
                        Ir al carrito de compras
                    </x-button-enlace>
                </div>
            @endif
        </x-slot>
    </x-jet-dropdown>
</div>
