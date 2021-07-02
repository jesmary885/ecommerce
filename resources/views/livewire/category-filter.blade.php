<div>
    {{--Tarjeta con nombre de categoria y tipo de vista--}}
   <div class="bg-white rounded shadow-lg mb-8">
      <div class="px-8 py-2 flex justify-between items-center">
          <h1 class="text-blue-500 font-bold uppercase">{{$category->name}}</h1>

          <div class="grid grid-cols-2 border border-gray-200 divide-x divide-gray-200 text-gray-400">
              <i class="fas fa-border-all p-3 cursor-pointer {{$view == 'grid' ? 'text-blue-500 text-font-bold' : ''}}" wire:click="$set('view', 'grid')" ></i>
              <i class="fas fa-th-list p-3 cursor-pointer {{$view == 'list' ? 'text-blue-500 text-font-bold' : ''}}" wire:click="$set('view','list')"></i>
          </div>
      </div>
   </div>

   {{--Seccion donde se muestran las subcategorias y los productos--}}
   <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
       {{--Filtros de Subcategorias y marcas--}}
        <aside>
            {{--Filtros por subcategorias--}}
            <ul class="divide-y divide-gray-200">
                @foreach ($category->subcategories as $subcategory)
                    <li class="my-2 text-lg font-semibold text-gray-500">
                        <a class="cursor-pointer hover:text-blue-500 {{$subcategoria == $subcategory->name ? 'text-blue-500 font-bold' : ''}}"
                            wire:click="$set('subcategoria','{{$subcategory->name}}')"
                        >{{$subcategory->name}}</a>
                    </li>
                @endforeach
            </ul>
            {{--Filtros por marca---}}
            <h1 class="font-semibold text-center mt-4 mb-2">Marcas</h1>
            <ul class="divide-y divide-gray-200">
                @foreach ($category->brands as $brand)
                    <li class="my-2 text-lg font-semibold text-gray-500">
                        <a class="cursor-pointer hover:text-blue-500 {{$marca == $brand->name ? 'text-blue-500 font-bold' : ''}}"
                            wire:click="$set('marca','{{$brand->name}}')"
                        >{{$brand->name}}</a>
                    </li>
                @endforeach
            </ul>
            {{--Boton eliminar filtros--}}
            <x-jet-button class="mt-6" wire:click="limpiar">
                Eliminar filtros
            </x-jet-button>
        </aside>
        {{--Productos--}}
        <div class="md:col-span-2 lg:col-span-4">
            {{--Vista en grid--}}
            @if ($view == 'grid')
                <ul class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow">
                        <article>
                            <figure>
                                <img class="h-48 w-full object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">  
                            </figure>
                            <div>
                                <h1 class="text-lg font-semibold">
                                    <a href="{{route('products.show',$product)}}">
                                        {{Str::limit($product->name, 40)}}
                                    </a>
                                </h1>
                                <p class="font-semibold text-blue-500">US$ {{$product->price}}</p>
                            </div>
                        </article>
                    </li>
                    @endforeach
                </ul>
            @else
            {{--Vista en lista--}}
                <ul>
                    @foreach ($products as $product)
                    <li class="bg-white rounded-lg shadow mb-4">
                        <article class="flex">
                            <figure>
                                <img class="h-48 w-56 object-cover object-center" src="{{ Storage::url($product->images->first()->url) }}" alt="">  
                            </figure>
                            <div class="flex-1 py-4 px-6">
                                <div class="flex justify-between">
                                    <div>
                                        <h1 class="text-lg font-semibold">
                                            <a href="{{route('products.show',$product)}}">
                                                {{Str::limit($product->name, 80)}}
                                            </a>
                                        </h1>
                                        <p class="font-semibold text-blue-500">US$ {{$product->price}}</p>
                                    </div>
                                     {{--Puntuacion del producto--}}
                                    <div class="flex items-center">
                                        <ul>
                                            <li class="fas fa-star text-yellow-400 mr-1"></li>
                                            <li class="fas fa-star text-yellow-400 mr-1"></li>
                                            <li class="fas fa-star text-yellow-400 mr-1"></li>
                                            <li class="fas fa-star text-yellow-400 mr-1"></li>
                                            <li class="fas fa-star text-yellow-400 mr-1"></li>
                                        </ul>
                                        <span class="text-blue-500 text-sm">(25)</span>
                                    </div>
                                </div>
                            </div>   
                        </article>
                    </li>
                    @endforeach
                </ul>
            @endif
                
            {{--Paginación--}}
            <div class="mt-4">
                {{$products->links()}}
            </div>
        </div>
   </div>
</div>
