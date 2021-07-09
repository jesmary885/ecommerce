<x-app-layout>
    <div class="container py-8">
        <div class="grid grid-cols-2 gap-6">
            {{--Columna nro 1 slider con imagenes--}}
            <div>
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($product->images as $image)
                            <li data-thumb=" {{ Storage::url($image->url) }}">
                                <img src="{{ Storage::url($image->url)}}" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{--Columna nro 2 detalle del producto--}}
            <div>
                <h1 class="text-2xl font-bold text-blue-500">{{$product->name}}</h1>
                <div class="flex items-center my-4">
                        <p class="text-gray-700 font-bold text-lg mx-6">Marca: <a class="text-gray-700 font-semibold hover:text-blue-500 underline" href="">{{$product->brand->name}}</a></p>
                        <p class="text-gray-700 text-lg mx-1">5 <i class="fas fa-star text-lg text-yellow-400"></i></p>
                        <a class="text-gray-700 underline text-lg" href="">39 reseñas</a>
                </div>
                <p class="text-2xl font-semibold text-green-600 my-4 mx-6">USD {{$product->price}}</p>

                {{--Tarjeta de envio--}}
                <div class="bg-white rounded-lg shadow-lg mb-6">
                    <div class="p-4 flex items-center">
                        <span class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-500">
                            <i class="fas fa-truck text-sm text-TrueGray-50"></i>
                        </span>
                        <div class="ml-4">
                            <p class="text-xl font-semibold text-TrueGray-500"> Se hacen envios a toda Venezuela</p>
                            <p class="text lg font-semibold text-blue-500"> Recibelo el {{ Date::now()->addDay(7)->locale('es')->format('l j F')}}</p>
            
                        </div>
                    </div>
                </div>

               
                {{--Opciones dependiendo el tipo de producto--}}
                @if ($product->subcategory->size) {{--Si el campo size en la subcategoria de ese producto es true--}}
                    @livewire('add-cart-item-size', ['product' => $product])
                @elseif($product->subcategory->color) {{--Si el campo color en la subcategoria de ese producto es true--}}
                    @livewire('add-cart-item-color', ['product' => $product])
                @elseif($product->subcategory->author) {{--Si el campo author en la subcategoria de ese producto es true--}}
                    @livewire('add-cart-item-author', ['product' => $product])
                @else
                    @livewire('add-cart-item', ['product' => $product])
                @endif                
            </div>
        </div>
    </div>

    {{--Sript del slider--}}

    @push('script')
        <script>
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });
        </script>
    @endpush
</x-app-layout>